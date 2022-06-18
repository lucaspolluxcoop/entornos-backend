<?php

namespace Database\Factories;

use App\Models\PlateState;
use Illuminate\Database\Eloquent\Factories\Factory;

class PlateStateFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = PlateState::class;

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
