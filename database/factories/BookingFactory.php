<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class BookingFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'check_in' => $this->faker->dateTimeThisMonth(),
            'check_out' => $this->faker->dateTimeThisMonth(),
            // 'room_numbers' => $this->faker->numberBetween(1,10),
            'room_no' => $this->faker->numberBetween(101,909),
            'visitor_email' => $this->faker->email(),
            'visitor_numbers' => $this->faker->numberBetween(1,5),
            'bill' => $this->faker->randomElement(['paid', 'due']),
        ];
    }
}
