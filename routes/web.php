<?php

use App\Http\Controllers\Admin\AdminCategoryController;
use App\Http\Controllers\Admin\AdminAuthorController;
use App\Http\Controllers\Admin\AdminUserController;
use App\Http\Controllers\Admin\AdminBookController;
use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [HomeController::class, 'index'])->name('home');

Route::group(['middleware' => 'auth'], function(){

    Route::group(['prefix' => 'admin', 'as' => 'admin.', 'middleware' => 'is_admin'], function(){
        // Books
        Route::get('books/trashBooks', [AdminBookController::class, 'trashBooks'])
            ->name('books.trashBooks');

        Route::get('books/restore/{id}', [AdminBookController::class, 'restore'])
            ->name('books.restore');

        Route::delete('books/forceDelete/{book}', [AdminBookController::class, 'forceDelete'])
            ->name('book.forceDelete');

        Route::resource('books', AdminBookController::class);
        // Categories
        Route::get('categories/uncategorizedBooks', [AdminCategoryController::class, 'uncategorizedBooks'])
            ->name('category.uncategorizedBooks');

        Route::get('categories/books/{id}', [AdminCategoryController::class, 'books'])
            ->name('category.books');

        Route::resource('categories', AdminCategoryController::class);
        // Users
        Route::resource('users', AdminUserController::class);
        // Authors
        Route::resource('authors', AdminAuthorController::class);
    });
});