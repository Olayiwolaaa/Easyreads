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
        Category::create(['name' => 'Sci-Fi', 'slug' => 'sci-fi']);
        Category::create(['name' => 'Romance', 'slug' => 'romance']);
        Category::create(['name' => 'Life Style', 'slug' => 'life-style']);
        Category::create(['name' => 'History', 'slug' => 'history']);
        Category::create(['name' => 'History', 'slug' => 'history']);
    }
}
