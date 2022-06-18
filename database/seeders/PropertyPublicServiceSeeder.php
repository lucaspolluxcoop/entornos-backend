<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\PropertyPublicService;

class PropertyPublicServiceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $services = [
            ["title" => "Electricidad por red",                 "value" => "electricidad_red"],
            ["title" => "Electricidad solar",                   "value" => "electricidad_solar"],
            ["title" => "Electricidad otra",                    "value" => "electricidad_otra"],
            ["title" => "Gas por red",                          "value" => "gas_red"],
            ["title" => "Gas otra",                             "value" => "gas_otra"],
            ["title" => "Red cloacal",                          "value" => "red_cloacal"],
            ["title" => "Agua Potable",                         "value" => "agua_potable"],
            ["title" => "Pavimento",                            "value" => "pavimento"],
            ["title" => "Alumbrado, Barrido y Limpieza calles", "value" => "alumbrado"],
            ["title" => "P.H. - Expensas",                      "value" => "ph_expensas"],
        ];
        foreach($services as $service) {
            PropertyPublicService::factory()->create($service);
        }
    }
}
