<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class ItemFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => $this->faker->sentence(3),
            'description' => $this->faker->text(),
            'image' => 'https://picsum.photos/seed/'.$this->faker->unique()->word.'/480/320/',
            'location' => $this->faker->state(),
            'price' => ($this->faker->numberBetween(10,200) * 1000),
            'status' => $this->faker->randomElement(array(true, false))
        ];
    }
}
