<?php

namespace Database\Seeders;

use App\Models\PropertyType;
use Illuminate\Database\Seeder;

class PropertyTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $types = [
            ['value' => 'monoambiente',     'title' => 'Monoambiente'],
            ['value' => 'loft',             'title' => 'Loft'],
            ['value' => 'departamento_ph',  'title' => 'Departamento (P.H.)'],
            ['value' => 'casa',             'title' => 'Casa'],
            ['value' => 'cabaña',           'title' => 'Cabaña'],
            ['value' => 'cochera',          'title' => 'Cochera'],
            ['value' => 'garage',           'title' => 'Garage'],
            ['value' => 'baulera_deposito', 'title' => 'Baulera / Depósito'],
            ['value' => 'local',            'title' => 'Local'],
            ['value' => 'galpon',           'title' => 'Galpón'],
            ['value' => 'tinglado',         'title' => 'Tinglado'],
            ['value' => 'nautica',          'title' => 'Naútica'],
            ['value' => 'planta_industrial','title' => 'Planta Industrial'],
            ['value' => 'lote_baldio',      'title' => 'Lote baldío'],
            ['value' => 'chacra_finca',     'title' => 'Chacra / Finca'],
            ['value' => 'campo',            'title' => 'Campo']
        ];

        foreach($types as $type) {
            PropertyType::factory()->create($type);
        }
    }
}