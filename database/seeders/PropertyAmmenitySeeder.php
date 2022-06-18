<?php

namespace Database\Seeders;

use App\Models\PropertyType;
use App\Models\AmmenityValue;
use Illuminate\Database\Seeder;
use App\Models\PropertyAmmenity;
use App\Models\PropertyTypeAmmenity;

class PropertyAmmenitySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $ammenities = [
            ['type' => 'list',      'value' => 'commercial_destination',            'extra_data' => false,  'title' => 'Destino Commercial',                'relations' => ['local'],                       'ammenityValues' => ['Guarda de Bienes Propios', 'Comercial', 'Servicios Profesionales', 'Servicios de Salud', 'Servicios Religiosos', 'Otro']],
            ['type' => 'list',      'value' => 'structure_type',                    'extra_data' => false,  'title' => 'Estructura',                        'relations' => ['galpon','tinglado'],           'ammenityValues' => ['H°A°','Metálica','Metálica y mampostería']],
            ['type' => 'list',      'value' => 'floor_type',                        'extra_data' => false,  'title' => 'Piso',                              'relations' => ['galpon','tinglado'],           'ammenityValues' => ['H°A°','Tierra']],

            ['type' => 'integer',   'value' => 'bedrooms_quantity',                 'extra_data' => false,  'title' => 'Dormitorios',                       'relations' => ['monoambiente','loft','departamento_ph','casa','cabaña']],
            ['type' => 'boolean',   'value' => 'closet',                            'extra_data' => false,  'title' => 'Placares',                          'relations' => ['monoambiente','loft','departamento_ph','casa','cabaña'],           'ammenityValues' => ['S','N']],
            ['type' => 'integer',   'value' => 'bathrooms',                         'extra_data' => false,  'title' => 'Baños',                             'relations' => ['monoambiente','loft','departamento_ph','casa','cabaña']],
            ['type' => 'boolean',   'value' => 'vanity',                            'extra_data' => false,  'title' => 'Antebaño',                          'relations' => ['monoambiente','loft','departamento_ph','casa','cabaña']],
            ['type' => 'integer',   'value' => 'rooms_quantity',                    'extra_data' => false,  'title' => 'Cant. de ambientes',                'relations' => ['monoambiente','loft','departamento_ph','casa','cabaña','local']],
            ['type' => 'boolean',   'value' => 'warehouse',                         'extra_data' => false,  'title' => 'Garage',                            'relations' => ['monoambiente','loft','departamento_ph','casa','cabaña'],           'ammenityValues' => ['S','N']],
            ['type' => 'boolean',   'value' => 'garage',                            'extra_data' => false,  'title' => 'Cochera',                           'relations' => ['monoambiente','loft','departamento_ph','casa','cabaña'],           'ammenityValues' => ['S','N']],
            ['type' => 'boolean',   'value' => 'balcony',                           'extra_data' => false,  'title' => 'Balcón',                            'relations' => ['monoambiente','loft','departamento_ph','casa','cabaña'],           'ammenityValues' => ['S','N']],
            ['type' => 'boolean',   'value' => 'yard',                              'extra_data' => false,  'title' => 'Patio',                             'relations' => ['monoambiente','loft','departamento_ph','casa','cabaña'],           'ammenityValues' => ['S','N']],
            ['type' => 'boolean',   'value' => 'swimming_pool',                     'extra_data' => false,  'title' => 'Piscina',                           'relations' => ['monoambiente','loft','departamento_ph','casa','cabaña'],           'ammenityValues' => ['S','N']],
            ['type' => 'boolean',   'value' => 'horizontal_property',               'extra_data' => false,  'title' => 'Propiedad horizontal',              'relations' => ['monoambiente','loft','departamento_ph','casa','cabaña'],           'ammenityValues' => ['S','N']],
            ['type' => 'boolean',   'value' => 'holiday_property',                  'extra_data' => false,  'title' => 'Inmueble vacacional',               'relations' => ['monoambiente','loft','departamento_ph','casa','cabaña'],           'ammenityValues' => ['S','N']],
            ['type' => 'boolean',   'value' => 'manual_closing',                    'extra_data' => false,  'title' => 'Cierre manual',                     'relations' => ['cochera','garage','baulera_deposito'],     'ammenityValues' => ['S','N']],
            ['type' => 'boolean',   'value' => 'automatic_closing',                 'extra_data' => false,  'title' => 'Cierre automático',                 'relations' => ['cochera','garage','baulera_deposito'],     'ammenityValues' => ['S','N']],
            ['type' => 'integer',   'value' => 'bathrooms_quantity',                'extra_data' => false,  'title' => 'Cant. de baños',                    'relations' => ['local','galpon','tinglado']],
            ['type' => 'integer',   'value' => 'kitchen_quantity',                  'extra_data' => false,  'title' => 'Cocina/Kitchenette',                'relations' => ['local','galpon','tinglado']],
            ['type' => 'boolean',   'value' => 'parking_lot',                       'extra_data' => false,  'title' => 'Estacionamiento propio',            'relations' => ['local'],                       'ammenityValues' => ['S','N']],
            ['type' => 'integer',   'value' => 'shed_free_ground_area',             'extra_data' => false,  'title' => 'Superficie terreno libre',          'relations' => ['galpon','tinglado']],
            ['type' => 'integer',   'value' => 'shed_office_quantity',              'extra_data' => false,  'title' => 'Cant. de oficinas',                 'relations' => ['galpon','tinglado']],
            ['type' => 'boolean',   'value' => 'dock_workshop',                     'extra_data' => true,   'title' => 'Galpón taller',                     'relations' => ['nautica'],                     'ammenityValues' => ['S','N']],
            ['type' => 'boolean',   'value' => 'dock',                              'extra_data' => true,   'title' => 'Galpón guardería',                  'relations' => ['nautica'],                     'ammenityValues' => ['S','N']],
            ['type' => 'boolean',   'value' => 'nautical_bed',                      'extra_data' => true,   'title' => 'Cama náutica',                      'relations' => ['nautica'],                     'ammenityValues' => ['S','N']],
            ['type' => 'boolean',   'value' => 'nautical_mooring',                  'extra_data' => true,   'title' => 'Amarra náutica',                    'relations' => ['nautica'],                     'ammenityValues' => ['S','N']],
            ['type' => 'boolean',   'value' => 'gathering',                         'extra_data' => false,  'title' => 'Acopio',                            'relations' => ['planta_industrial'],           'ammenityValues' => ['S','N']],
            ['type' => 'boolean',   'value' => 'raw_material_process',              'extra_data' => false,  'title' => 'Procesamiento de materia prima',    'relations' => ['planta_industrial'],           'ammenityValues' => ['S','N']],
            ['type' => 'boolean',   'value' => 'offices',                           'extra_data' => false,  'title' => 'Oficinas',                          'relations' => ['planta_industrial'],           'ammenityValues' => ['S','N']],
            ['type' => 'boolean',   'value' => 'laboratory',                        'extra_data' => false,  'title' => 'Laboratório',                       'relations' => ['planta_industrial'],           'ammenityValues' => ['S','N']],
            ['type' => 'boolean',   'value' => 'cold_chamber',                      'extra_data' => false,  'title' => 'Cámara de frío',                    'relations' => ['planta_industrial'],           'ammenityValues' => ['S','N']],
            ['type' => 'boolean',   'value' => 'store',                             'extra_data' => false,  'title' => 'Bodega',                            'relations' => ['planta_industrial'],           'ammenityValues' => ['S','N']],
            ['type' => 'boolean',   'value' => 'silo',                              'extra_data' => false,  'title' => 'Silos',                             'relations' => ['planta_industrial'],           'ammenityValues' => ['S','N']],
            ['type' => 'boolean',   'value' => 'transport_weighing_scale',          'extra_data' => false,  'title' => 'Balanza de pesaje transporte',      'relations' => ['planta_industrial'],           'ammenityValues' => ['S','N']],
            ['type' => 'integer',   'value' => 'front_dimensions',                  'extra_data' => false,  'title' => 'Frente',                            'relations' => ['lote_baldio']],
            ['type' => 'integer',   'value' => 'back_dimensions',                   'extra_data' => false,  'title' => 'Fondo',                             'relations' => ['lote_baldio']],
            ['type' => 'boolean',   'value' => 'perimeter_fence',                   'extra_data' => false,  'title' => 'Cerramiento perimetral',            'relations' => ['lote_baldio'],                 'ammenityValues' => ['S','N']],
            ['type' => 'boolean',   'value' => 'house_room',                        'extra_data' => false,  'title' => 'Casa habitación',                   'relations' => ['chacra_finca'],                'ammenityValues' => ['S','N']],
            ['type' => 'integer',   'value' => 'barn_area',                         'extra_data' => false,  'title' => 'Galpón',                            'relations' => ['chacra_finca']],
            ['type' => 'integer',   'value' => 'total_area',                        'extra_data' => false,  'title' => 'Superficie total',                  'relations' => ['campo']],
            ['type' => 'integer',   'value' => 'agricultural_area',                 'extra_data' => false,  'title' => 'Superficie agrícola',               'relations' => ['campo']],
            ['type' => 'integer',   'value' => 'livestock_area',                    'extra_data' => false,  'title' => 'Superficie ganadera',               'relations' => ['campo']],
            ['type' => 'integer',   'value' => 'lagoon_area',                       'extra_data' => false,  'title' => 'Superficie bajos/laguna',           'relations' => ['campo']],
            ['type' => 'boolean',   'value' => 'main_house',                        'extra_data' => false,  'title' => 'Casa principal',                    'relations' => ['campo'],                       'ammenityValues' => ['S','N']],
            ['type' => 'boolean',   'value' => 'employee_house',                    'extra_data' => false,  'title' => 'Casa para empleados',               'relations' => ['campo'],                       'ammenityValues' => ['S','N']],
            ['type' => 'boolean',   'value' => 'administrative_infrastructure',     'extra_data' => false,  'title' => 'Infraestructura administrativa',    'relations' => ['campo'],                       'ammenityValues' => ['S','N']],
            ['type' => 'boolean',   'value' => 'grain_gathering_infrastructure',    'extra_data' => false,  'title' => 'Infraestructura acopio grano',      'relations' => ['campo'],                       'ammenityValues' => ['S','N']],
            ['type' => 'boolean',   'value' => 'livestock_infrastructure',          'extra_data' => false,  'title' => 'Infraestructura ganadera',          'relations' => ['campo'],                       'ammenityValues' => ['S','N']],
            ['type' => 'boolean',   'value' => 'milking_yard_infrastructure',       'extra_data' => false,  'title' => 'Infraestructura tambo',             'relations' => ['campo'],                       'ammenityValues' => ['S','N']],
            ['type' => 'boolean',   'value' => 'shed',                              'extra_data' => false,  'title' => 'Galpón / Tinglado',                 'relations' => ['campo'],                       'ammenityValues' => ['S','N']],
            ['type' => 'integer',   'value' => 'paved_road_distance',               'extra_data' => false,  'title' => 'Distancia a ruta pavimentada',      'relations' => ['campo']],
            ['type' => 'integer',   'value' => 'latitude',                          'extra_data' => false,  'title' => 'Latitud',                           'relations' => ['campo']],
            ['type' => 'integer',   'value' => 'longitude',                         'extra_data' => false,  'title' => 'Longitud',                          'relations' => ['campo']]
        ];

        foreach($ammenities as $ammenity) {
            $ammenitieValues = [];

            // check the array quantity to see if has ammenityValues
            if(count($ammenity) == 6) {
                $ammenitieValues = array_pop($ammenity);
            }
            $relations = array_pop($ammenity);
            $newAmmenity = PropertyAmmenity::factory()->create($ammenity);

            if(count($ammenitieValues) != 0) {
                foreach($ammenitieValues as $value) {
                    AmmenityValue::create([
                        'property_ammenity_id'  => $newAmmenity->id,
                        'value'                 => $value
                    ]);
                }
            }

            foreach($relations as $relation) {
                $propertyType = PropertyType::where('value',$relation)->first();
                PropertyTypeAmmenity::create([
                    'property_type_id'      => $propertyType->id ,
                    'property_ammenity_id'  => $newAmmenity->id
                ]);
            }
        }
    }
}