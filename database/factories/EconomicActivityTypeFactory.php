<?php

namespace Database\Factories;

use App\Models\EconomicActivityType;
use Illuminate\Database\Eloquent\Factories\Factory;

class EconomicActivityTypeFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = EconomicActivityType::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'title' => $this->faker->name()
        ];
    }
}
