<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Books_api_controller;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::get('/books',[Books_api_controller::class, 'index']);

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/books',[Books_api_controller::class, 'index']);
Route::post('/books',[Books_api_controller::class, 'create']);
Route::get('/books/{id}',[Books_api_controller::class, 'show']);
Route::put('/books/{id}',[Books_api_controller::class, 'update']);
Route::delete('/books/{id}',[Books_api_controller::class, 'destroy']);
