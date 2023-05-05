<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class ListingFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            /*
            $table->string('title');
            $table->string('tags');
            $table->string('company');
            $table->string('location');
            $table->string('website');
            $table->longText('description');
            $table->string('email');
            */
            'title' =>$this->faker->sentence(),
            'tags' => 'javascript,python',
            'company' => $this->faker->company(),
            'location' => $this->faker->city(),
            'website' => $this->faker->url(),
            'description' => $this->faker->paragraph(5),
            'email' => $this->faker->companyEmail()
        ];
    }
}
