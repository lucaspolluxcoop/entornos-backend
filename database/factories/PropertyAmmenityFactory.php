<?php

namespace Database\Factories;

use App\Models\PropertyAmmenity;
use Illuminate\Database\Eloquent\Factories\Factory;

class PropertyAmmenityFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = PropertyAmmenity::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'value' => $this->faker->name(),
            'title' => $this->faker->name(),
            'type'  => $this->faker->randomElement(['boolean', 'integer', 'list'])
        ];
    }
}
