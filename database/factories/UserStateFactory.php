<?php

namespace Database\Factories;

use App\Models\UserState;
use Illuminate\Database\Eloquent\Factories\Factory;

class UserStateFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = UserState::class;

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
