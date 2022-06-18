<?php

namespace Database\Seeders;

use App\Models\Role;
use App\Models\Permission;
use Illuminate\Database\Seeder;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        foreach (config('roles') as $name => $role) {
            $permissions = $role['permissions'];

            if (! ($profile = Role::whereName($name)->first())) {
                /** @var Role $profile */
                $profile = Role::create([
                    'name' => $name,
                    'label' => $role['label'],
                ]);
            }
            $permissions_to_be_added = [];

            if (count($permissions) > 0) {
                foreach ($permissions as $action => $sections) {
                    $permissions_to_be_added = array_merge(
                        $permissions_to_be_added,
                        $this->getPermissions($action, $sections)
                    );

                }
            }

            $profile->permissions()->sync(
                Permission::whereIn('name', $permissions_to_be_added)->pluck('id')->all()
            );

            echo 'Perfil ' . $profile->label . ' creado ' . PHP_EOL;
        }
    }

    private function getPermissions($action, $sections)
    {
        if (count($sections) == 0) {
            return Permission::where('name', 'like', "%.$action")
                ->select('name')->pluck('name')
                ->all();
        }

        return preg_filter('/$/', ".{$action}", $sections);
    }
}
