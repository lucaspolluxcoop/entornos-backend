<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\EconomicActivityType;

class EconomicActivityTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $activities = [
            'Relación de Dependencia',
            'Actividad Independiente',
            'Jubilado/Pensionado',
            'Sin Actividad Declarada'
        ];
        foreach($activities as $activity) {
            EconomicActivityType::factory()->create([
                'title' => $activity
            ]);
        }
    }
}
