<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\ContractNotificationResponse;

class ContractNotificationResponseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $responses = [
            ['title'    => 'Positiva'],
            ['title'    => 'Negativa'],
            ['title'    => 'Sin Respuesta']
        ];

        foreach($responses as $response) {
            ContractNotificationResponse::factory()->create($response);
        }
    }
}
