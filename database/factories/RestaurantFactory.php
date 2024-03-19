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
            'name' => fake()->company(),
            'description' => fake()->realText(100),
            'category_id' => fake()->numberBetween(1,5),
            'img' => 'img/dummy.png',
            'business_hours' => fake()->time('H:i'),
            'address' => fake()->address(),
            'phone_number' => fake()->phoneNumber()
        ];
    }
}
