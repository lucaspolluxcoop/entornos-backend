<?php

namespace Database\Seeders;

use App\Models\WarrantyType;
use Illuminate\Database\Seeder;

class WarrantyTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $warrantyTypes =[
            'Título de Propiedad Inmueble',
            'Aval Bancario',
            'Seguro de Caución para Alquileres',
            'Garantía Personal del Locatario',
            'Garantía de Fianza o Fiador Solidario'
        ];

        foreach($warrantyTypes as $warrantyType) {
            WarrantyType::factory()->create([
                'title' => $warrantyType
            ]);
        }
    }
}
