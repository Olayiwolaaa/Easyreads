<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Seeder;

class CategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Category::create(['name' => 'Science Fiction', 'slug' => 'sci-fi']);
        Category::create(['name' => 'Romance', 'slug' => 'romance']);
        Category::create(['name' => 'Life Style', 'slug' => 'life-style']);
        Category::create(['name' => 'Historical Fiction', 'slug' => 'historical-fiction']);
        Category::create(['name' => 'Action and Adventure', 'slug' => 'action-and-adventure']);
        Category::create(['name' => 'Classic', 'slug' => 'classic']);
        Category::create(['name' => 'Comic Book', 'slug' => 'comic-book']);
        Category::create(['name' => 'Graphic Novel', 'slug' => 'graphic-novel']);
        Category::create(['name' => 'Fantasy', 'slug' => 'fantasy']);
        Category::create(['name' => 'Suspense and Thrillers', 'slug' => 'suspense-and-thrillers']);
    }
}
