<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\NotificationResponse;

class NotificationResponseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $responses = [
            ['title'    => 'Gestión con respuesta satisfactoria'],
            ['title'    => 'Gestión con respuesta aceptable'],
            ['title'    => 'Gestión con respuesta negativa'],
            ['title'    => 'Gestión sin respuesta'],
        ];

        foreach($responses as $response) {
            NotificationResponse::factory()->create($response);
        }
    }
}
