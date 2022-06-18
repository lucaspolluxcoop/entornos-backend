<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\PropertyTermination;

class PropertyTerminationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $terminations = [
        [["id" => 1], [ "title"    => "Premium"]],
        [["id" => 2], [ "title"    => "Superior al estandar"]],
        [["id" => 3], [ "title"    => "Estandar"]],
        [["id" => 4], [ "title"    => "Bajo el estandar"]],
        [["id" => 5], [ "title"    => "Sencilla"]]
        ];

        foreach($terminations as $termination) {
            PropertyTermination::updateOrCreate($termination[0], $termination[1]);
        }
    }
}
