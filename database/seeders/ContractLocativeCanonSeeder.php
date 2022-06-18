<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\ContractLocativeCanon;

class ContractLocativeCanonSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $canons = [
            ['title' => 'Anual'],
            ['title' => 'Mensual'],
            ['title' => 'Diario'],
            ['title' => 'Por Ha'],
            ['title' => '% sobre la producción']
        ];

        foreach($canons as $canon) {
            ContractLocativeCanon::factory()->create($canon);
        }
    }
}
