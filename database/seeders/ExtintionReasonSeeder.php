<?php

namespace Database\Seeders;

use App\Models\ExtintionReason;
use Illuminate\Database\Seeder;

class ExtintionReasonSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $reasons = [
            [
                'id'    => 1,
                'title' => 'Vencimiento del plazo locativo'
            ],
            [
                'id'    => 2,
                'title' => 'Rescisión del contrato por acuerdo de partes'
            ],
            [
                'id'    => 3,
                'title' => 'Rescisión del contrato por ejercicio del derecho del Locatario'
            ],
            [
                'id'    => 4,
                'title' => 'Gestiones para obtener la desocupación'
            ],
            [
                'id'    => 5,
                'title' => 'Desalojo Judicial'
            ],
            [
                'id'    => 6,
                'title' => 'Fallecimiento del locatario'
            ],
            [
                'id'    => 7,
                'title' => 'Incumplimiento del locador'
            ],
            [
                'id'    => 8,
                'title' => 'Venta del inmueble locado'
            ],
            [
                'id'    => 9,
                'title' => 'Otro'
            ],
        ];
        foreach($reasons as $reason) {
            ExtintionReason::factory()->create($reason);
        }
    }
}
