<?php

namespace Database\Factories;

use App\Models\Author;
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
        $name = $this->faker->text(20);
        $init_price = $this->faker->biasedNumberBetween(10, 200);
        // $discount_rate = $this->faker->biasedNumberBetween(0, 100);
        // $price = $init_price - (($discount_rate/100)*$init_price);

        return [
            'title' => $name,
            'slug' => str_replace(' ', '-', strtolower($name)),
            'description' => $this->faker->text(200),
            'category_id' => rand(1, 10),
            'quantity' => rand(1, 20),
            'init_price' => $init_price,
            'discount_price' => rand($init_price, $init_price/2),
            // 'coupon_code' => strtoupper($this->faker->firstName()).''.rand(1000, 5000),
            // 'price' => $price,
        ];
    }
}
