<?php

namespace Database\Factories;

use App\Models\ContractNotificationResponse;
use Illuminate\Database\Eloquent\Factories\Factory;

class ContractNotificationResponseFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = ContractNotificationResponse::class;

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
