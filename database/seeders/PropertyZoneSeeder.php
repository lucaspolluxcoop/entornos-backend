<?php

namespace Database\Seeders;

use App\Models\PropertyType;
use App\Models\PropertyZone;
use Illuminate\Database\Seeder;
use App\Models\PropertyZonePropertyType;

class PropertyZoneSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $zones = [
            ['title' => 'Microcentro',          'relations' => ['monoambiente','loft','departamento_ph','casa','cabaña','galpon','tinglado']],
            ['title' => 'Centro',               'relations' => ['monoambiente','loft','departamento_ph','casa','cabaña','galpon','tinglado']],
            ['title' => 'Barrio',               'relations' => ['monoambiente','loft','departamento_ph','casa','cabaña','galpon','tinglado']],
            ['title' => 'Suburbano',            'relations' => ['monoambiente','loft','departamento_ph','casa','cabaña','galpon','tinglado','planta_industrial','lote_baldio','chacra_finca']],
            ['title' => 'Parque Industrial',    'relations' => ['galpon','tinglado','planta_industrial','lote_baldio']],
            ['title' => 'Barrio cerrado',       'relations' => ['monoambiente','loft','departamento_ph','casa','cabaña']],
            ['title' => 'Zona Quintas',         'relations' => ['monoambiente','loft','departamento_ph','casa','cabaña']],
            ['title' => 'Zona Chacras',         'relations' => ['monoambiente','loft','departamento_ph','casa','cabaña']],
            ['title' => 'Línea de playa',       'relations' => ['monoambiente','loft','departamento_ph','casa','cabaña']],
            ['title' => 'Montaña',              'relations' => ['monoambiente','loft','departamento_ph','casa','cabaña']],
            ['title' => 'Rural',                'relations' => ['planta_industrial','lote_baldio','chacra_finca']],
            ['title' => 'Sector Industrial',    'relations' => ['lote_baldio']]
        ];

        foreach($zones as $zone) {
        $relations = array_pop($zone);
            $newPropertyZone = PropertyZone::factory()->create($zone);
            foreach($relations as $relation) {
                $propertyType = PropertyType::where('value',$relation)->first();
                PropertyZonePropertyType::create([
                    'property_zone_id' => $newPropertyZone->id,
                    'property_type_id' => $propertyType->id
                ]);
            }
        }
    }
}