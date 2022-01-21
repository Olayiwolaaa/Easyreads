<?php

namespace Database\Factories;

use App\Models\Book;
use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\User;

class ReviewFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            // 'book_id' => Book::all('id')->random(),
            // 'book_id' => rand(1, 15),
            'body' => $this->faker->text(200)
        ];
    }
}
