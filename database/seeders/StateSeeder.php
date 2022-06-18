<?php

namespace Database\Seeders;

use App\Models\State;
use Illuminate\Database\Seeder;

class StateSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $states = [
            ["name" => "Buenos Aires",                      "code" => "BA"],
            ["name" => "Ciudad Autónoma de Buenos Aires",   "code" => "CABA"],
            ["name" => "Catamarca",                         "code" => "CA"],
            ["name" => "Chaco",                             "code" => "CH"],
            ["name" => "Chubut",                            "code" => "CT"],
            ["name" => "Córdoba",                           "code" => "CB"],
            ["name" => "Corrientes",                        "code" => "CR"],
            ["name" => "Entre Ríos",                        "code" => "ER"],
            ["name" => "Formosa",                           "code" => "FO"],
            ["name" => "Jujuy",                             "code" => "JY"],
            ["name" => "La Pampa",                          "code" => "LP"],
            ["name" => "La Rioja",                          "code" => "LR"],
            ["name" => "Mendoza",                           "code" => "MZ"],
            ["name" => "Misiones",                          "code" => "MI"],
            ["name" => "Neuquén",                           "code" => "NQ"],
            ["name" => "Río Negro",                         "code" => "RN"],
            ["name" => "Salta",                             "code" => "SA"],
            ["name" => "San Juan",                          "code" => "SJ"],
            ["name" => "San Luis",                          "code" => "SL"],
            ["name" => "Santa Cruz",                        "code" => "SC"],
            ["name" => "Santa Fe",                          "code" => "SF"],
            ["name" => "Santiago del Estero",               "code" => "SE"],
            ["name" => "Tierra del Fuego",                  "code" => "TF"],
            ["name" => "Tucumán",                           "code" => "TU"]
        ];
        foreach($states as $state) {
            State::updateOrCreate(
                ['name' => $state['name']],
                ['code' => $state['code']]
            );
        }
    }
}
