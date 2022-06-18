<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\PropertyPublicService;

class PropertyPublicServiceSecondSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        PropertyPublicService::factory()->create([
            'title' => 'Seguridad Privada',  'value' => 'private_security'
        ]);
    }
}
