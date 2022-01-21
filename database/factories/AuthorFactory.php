<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class AuthorFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        // $user = User::all(['id', 'name'])->random();
        // $user_name = str_replace(' ', '-', strtolower($user->name));

        return [
            // 'user_id' => $user->id,
            // 'slug' => $user_name,
            'bio' => $this->faker->text(200),
            'is_verified' => rand(0, 1),
        ];
    }
}
