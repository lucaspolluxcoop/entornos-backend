<?php

namespace Database\Seeders;

use App\Models\Role;
use App\Models\User;
use App\Models\Profile;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = User::factory()->create([
            'email'             =>'test@tunota.com',
            'password'          => bcrypt('12341234'),
            'identifier_code'   => 'BA000132121',
            'role_id'           => Role::where('name',Role::SUDO)->first()
        ]);
        Profile::factory()->create([
            'first_name'                => 'TuNota',
            'last_name'                 => 'Pollux',
            'zip'                       => '2000',
            'phone'                     => '3413456789',
            'economic_activity_type_id' => 1,
            'cuit'                      => '30716994887',
            'street'                     => 'San Lorenzo',
            'number'                    => 1333,
            'neighbourhood'             => 'centro',
            'user_id'                   => User::where('id', $user->id)->first()
        ]);
    }
}
