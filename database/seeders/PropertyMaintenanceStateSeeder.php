<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\PropertyMaintenanceState;

class PropertyMaintenanceStateSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $states = [
            [["id" => 1], ["title" => "Exelente"]],
            [["id" => 2], ["title" => "Muy bueno"]],
            [["id" => 3], ["title" => "Bueno"]],
            [["id" => 4], ["title" => "Regular"]],
            [["id" => 5], ["title" => "Nulo"]],
        ];

        foreach($states as $state) {
            PropertyMaintenanceState::updateOrCreate($state[0], $state[1]);
        }
    }
}
