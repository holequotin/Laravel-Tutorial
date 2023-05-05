<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class ExamFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            //
            'name' => $this->faker->sentence(),
            'level' => $this->faker->randomNumber(),
            'score' => $this->faker->randomNumber()
        ];
    }
}
