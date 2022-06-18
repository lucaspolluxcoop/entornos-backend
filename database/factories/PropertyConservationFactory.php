<?php

namespace Database\Factories;

use App\Models\PropertyConservation;
use Illuminate\Database\Eloquent\Factories\Factory;

class PropertyConservationFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = PropertyConservation::class;

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
