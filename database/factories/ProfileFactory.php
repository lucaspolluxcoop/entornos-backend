<?php

namespace Database\Factories;

use App\Models\State;
use App\Models\Profile;
use App\Models\EconomicActivityType;
use Illuminate\Database\Eloquent\Factories\Factory;

class ProfileFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Profile::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'first_name' => $this->faker->name(),
            'last_name' => $this->faker->name(),
            'district' => $this->faker->randomNumber(3),
            'zip' => $this->faker->postcode(),
            'phone' => $this->faker->phoneNumber(),
            'economic_activity_type_id' => EconomicActivityType::all()->random()
        ];
    }
}
