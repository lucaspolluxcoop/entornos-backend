<?php

namespace Database\Factories;

use App\Models\PropertyPublicService;
use Illuminate\Database\Eloquent\Factories\Factory;

class PropertyPublicServiceFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = PropertyPublicService::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'title' => $this->faker->name(),
            'value' => $this->faker->name()
        ];
    }
}
