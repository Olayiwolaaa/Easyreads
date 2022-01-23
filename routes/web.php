<?php

use App\Http\Controllers\Admin\AdminCategoryController;
use App\Http\Controllers\Admin\AdminAuthorController;
use App\Http\Controllers\Admin\AdminUserController;
use App\Http\Controllers\Admin\AdminBookController;
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
    // Books
    Route::group(['prefix' => 'admin', 'as' => 'admin.', 'middleware' => 'is_admin'], function(){
        Route::get('books/trash_books', [AdminBookController::class, 'trashBooks'])->name('books.trash-books');
        Route::get('books/restore/{id}', [AdminBookController::class, 'restore'])->name('books.restore');
        Route::delete('books/force_delete/{book}', [AdminBookController::class, 'forceDelete'])->name('books.forceDelete');
        Route::resource('books', AdminBookController::class);
    // Categories
    Route::resource('categories', AdminCategoryController::class);
    // Authors
    Route::resource('authors', AdminAuthorController::class);
    // Users
        Route::resource('users', AdminUserController::class);
    });
});
