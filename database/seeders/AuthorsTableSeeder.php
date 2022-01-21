<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Author;
use App\Models\Book;
use App\Models\Image;
use App\Models\Review;
use App\Models\User;

class AuthorsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Author::factory(5)
            ->create()
            ->each(function($author) {
            Book::factory(3)
                ->create(['author_id'=> $author->id])
                ->each(function($book){
                    $book->image()->save(Image::factory(1)->make());
            });
        });
    }
}
