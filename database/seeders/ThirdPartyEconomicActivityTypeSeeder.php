<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\EconomicActivityType;

class ThirdPartyEconomicActivityTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $activities = [
        [ "title" => "Comercio de Bienes Consumibles Personales", "third_party" => true],
        [ "title" => "Comercio de Bienes Consumibles Agropecuarios", "third_party" => true],
        [ "title" => "Comercio de Bienes para la Construcción", "third_party" => true],
        [ "title" => "Comercio de Bienes No Registrables", "third_party" => true],
        [ "title" => "Comercio de Bienes Registrales", "third_party" => true],
        [ "title" => "Servicios Financieros", "third_party" => true],
        [ "title" => "Servicios de Seguro", "third_party" => true],
        [ "title" => "Servicios Profesionales", "third_party" => true],
        [ "title" => "Servicios No Profesionales", "third_party" => true],
        [ "title" => "Servicios Públicos y Privados (electricidad, gas, agua, telefonía, internet, cable, etc)", "third_party" => true],
        [ "title" => "Servicios de Transporte", "third_party" => true],
        [ "title" => "Servicios de Turismo / Hotelería / Gastronomía", "third_party" => true],
        [ "title" => "Servicios de Educación Privada", "third_party" => true],
        [ "title" => "Servicios Deportivos y de Esparcimiento", "third_party" => true],
        [ "title" => "Servicios Prepagos de Salud", "third_party" => true],
        [ "title" => "Otros", "third_party" => true],
        ];
        foreach($activities as $activity) {
            EconomicActivityType::factory()
                ->create([
                    'title' => $activity['title'],
                    'third_party' => $activity['third_party']
                ]);
        }
    }
}
