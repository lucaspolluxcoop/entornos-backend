<?php

namespace Database\Seeders;

use App\Models\ContractType;
use Illuminate\Database\Seeder;

class ContractTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $types = [
            "Contrato de Locación Permanente",
            "Contrato de Locación Temporaria",
            "Contrato de Comodato",
            "Contrato de Arrendamiento",
            "Contrato Accidental de Arrendamiento",
            "Contrato de Aparcería"
        ];

        foreach($types as $type) {
            ContractType::factory()->create([
                'title' => $type
            ]);
        }
    }
}