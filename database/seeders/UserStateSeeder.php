<?php

namespace Database\Seeders;

use App\Models\UserState;
use Illuminate\Database\Seeder;

class UserStateSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $states = [
            ['title' => 'Creado',       'value' => 'created'],
            ['title' => 'Verificado',   'value' => 'verified'],
            ['title' => 'Inhabilitado', 'value' => 'disabled'],
        ];

        foreach($states as $state) {
            UserState::factory()->create($state);
        }
    }
}
