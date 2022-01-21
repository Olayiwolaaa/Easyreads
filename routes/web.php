<?php

use App\Http\Controllers\Admin\AdminAuthorsController;
use App\Http\Controllers\Admin\AdminCategoriesController;
use App\Http\Controllers\Admin\AdminUsersController;
use App\Http\Controllers\Admin\AdminBooksController;
use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [HomeController::class, 'index'])->name('home');

Route::group(['middleware' => 'auth'], function(){
    Route::group(['prefix' => 'admin', 'as' => 'admin.', 'middleware' => 'is_admin'], function(){
        Route::get('books/trash_books', [AdminBooksController::class, 'trashBooks'])->name('books.trash-books');
        Route::get('books/restore/{id}', [AdminBooksController::class, 'restore'])->name('books.restore');
        Route::delete('books/force_delete/{id}', [AdminBooksController::class, 'destroy'])->name('books.force-delete');
        Route::resource('books', AdminBooksController::class);
        Route::resource('categories', AdminCategoriesController::class);
        Route::resource('authors', AdminAuthorsController::class);
        Route::resource('users', AdminUsersController::class);
    });
});
