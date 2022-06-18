<?php

namespace Database\Factories;

use App\Models\PropertyZone;
use Illuminate\Database\Eloquent\Factories\Factory;

class PropertyZoneFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = PropertyZone::class;

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
