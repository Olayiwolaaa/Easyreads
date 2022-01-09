<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class BookFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $name = $this->faker->firstName().' '.$this->faker->lastName().' '.$this->faker->name();
        return [
            'name' => $name,
            'slug' => str_replace(' ', '-', $name),
            'description' => $this->faker->text(200),
            'quantity' => rand(1, 20),
            'init_price' => rand(10, 2000),
            'discount' => array_rand([5,20,50,100], 1),
            'coupon_code' => 'BLACKFRIDAY'.rand(1000, 5000),
            'price' => rand(10, 2000),
        ];
    }
}
