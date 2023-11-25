<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class ProductFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'title' => $this->faker->unique->sentence(rand(2,5)),
            'description' => $this->faker->sentences(),
            'price' => $this->faker->randomFloat(),
            'image' => $this->faker->image()
        ];
    }
}
