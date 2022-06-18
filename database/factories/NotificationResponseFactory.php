<?php

namespace Database\Factories;

use App\Models\NotificationResponse;
use Illuminate\Database\Eloquent\Factories\Factory;

class NotificationResponseFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = NotificationResponse::class;

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
