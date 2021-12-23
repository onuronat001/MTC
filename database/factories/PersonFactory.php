<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class PersonFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => $this->faker->name(),
            'birthday' => $this->faker->dateTimeBetween('1950-01-01', '2000-01-01'),
            'gender' => $this->faker->randomElement([1, 2])
        ];
    }
}
