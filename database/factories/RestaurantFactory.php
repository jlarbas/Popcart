<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Restaurant>
 */
class RestaurantFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'name' =>  $this->faker->sentence(),
            'status' => $this->faker->randomElement(['open', 'closed']),
            'address' => $this->faker->city(),
            'contact' => $this->faker->numerify('###########'),
        ];
    }
}
