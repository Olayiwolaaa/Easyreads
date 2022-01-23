<?php

namespace Database\Seeders;

use App\Models\Author;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;
use  App\Models\User;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'name' => 'Karaole Muizz Olayiwola',
            'email' => 'muizzkara91@gmail.com',
            'email_verified_at' => now(),
            'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
            'role_id' => 1,
            'remember_token' => Str::random(10),
        ])->each(function($user) 
        {
            Author::create(
                [
                    'user_id' => $user->id,
                    'slug' => str_replace(' ', '-', strtolower($user->name)),
                    'bio' => str::random(16)
                ]
            );
        });
    }
}
