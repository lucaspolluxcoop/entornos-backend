<?php

namespace Database\Factories;

use App\Models\PropertyTermination;
use Illuminate\Database\Eloquent\Factories\Factory;

class PropertyTerminationFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = PropertyTermination::class;

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
