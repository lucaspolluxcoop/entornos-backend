<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\PropertyConservation;

class PropertyConservationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $conservations = [
            [["id" => 1], ["title" => "Excelente. A Estrenar"]],
            [["id" => 2], ["title" => "Muy Bueno. No necesita reparaciones"]],
            [["id" => 3], ["title" => "Bueno. Necesita reparaciones sencillas"]],
            [["id" => 4], ["title" => "Regular. Necesita reparaciones importantes"]],
            [["id" => 5], ["title" => "Malo - Inhabitable / No utilizable"]],
            [["id" => 6], ["title" => "Estado de demolición"]]
        ];

        foreach($conservations as $conservation) {
            PropertyConservation::updateOrCreate($conservation[0], $conservation[1]);
        }
    }
}
