<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class CarFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'vin' => $this->faker->unique()->randomDigit(),
            'model' => $this->faker->name(),
            'brand' => $this->faker->name(),
            'color' => $this->faker->name(),
            'owner_id' => ($users = User::all()) ? $users->random(): User::factory()->create() ,
        ];
    }
}
