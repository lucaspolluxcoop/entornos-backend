<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\PlateState;

class PlateStateSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $states = [
            ['title' => 'Activa'],
            ['title' => 'Matrícula Vencida'],
            ['title' => 'Inhabilitación temporaria'],
            ['title' => 'Inhabilitación Definitiva']
        ];
        foreach($states as $state) {
            PlateState::factory()->create($state);
        }
    }
}
