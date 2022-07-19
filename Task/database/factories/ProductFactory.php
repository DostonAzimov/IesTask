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
            'title'=>$this->faker->text(15),
            'img'=>$this->faker->text(6).'.jpg',
            'category_id'=>$this->faker->numberBetween(1,8)
        ];
    }
}
