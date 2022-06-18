<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\EconomicActivityType;

class AddEconomicActivityTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        EconomicActivityType::factory()->create(['title' => 'Otra']);
    }
}
