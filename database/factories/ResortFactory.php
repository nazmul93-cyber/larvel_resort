<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class ResortFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'title' => $this->faker->sentence(),
            'description' => $this->faker->paragraph(),
            'location' => $this->faker->city(),
            'company' => $this->faker->company(),
            'email' => $this->faker->companyEmail(),
            'website' => $this->faker->url(),
            'tags' => 'travel, hotels, tourism, spa, photography',
            'room_numbers' => $this->faker->numberBetween(50, 500),
            'room_price' => $this->faker->numberBetween(500, 5000),
            'room_capacity' => $this->faker->numberBetween(2, 4),
            'available_from' => $this->faker->dateTimeThisYear(),
            'available_till' => $this->faker->dateTimeThisYear(),
        ];
    }
}
