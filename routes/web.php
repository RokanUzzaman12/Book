<?php

use Illuminate\Support\Facades\Route;
// use App\Http\Controllers\BookController;
use App\Http\Controllers\Books\BookController;

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
    return view('admin.admin_panel');
});


Route::resource('books', BookController::class);

// Route::get('/add-book',[BookController::class,"create"]);
// Route::post('/add-book',[BookController::class,"store"])->name('add');
// Route::get('/all_books',[BookController::class,"index"]);
// Route::get('/details/{id}',[BookController::class,"show"]);
// Route::get('/edit_book/{id}',[BookController::class,"edit"]);
// Route::post('/edit_book',[BookController::class,"update"])->name('edit');
// Route::get('/delete_book/{id}',[BookController::class,"destroy"]);



