<?php

namespace Database\Seeders;

use App\Models\Permission;
use Illuminate\Database\Seeder;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        foreach (config('permissions') as $action => $sections) {
            foreach ($sections as $section) {
                $name = "{$section}.{$action}";
                if (Permission::whereName($name)->first()) {
                    continue;
                }

                $label = __("permissions.action.$action") . ' ' . __("permissions.section.$section");

                Permission::create([
                    'name' => $name,
                ]);

                echo 'Permiso ' . $label . ' creado ' . PHP_EOL;
            }
        }
    }
}
