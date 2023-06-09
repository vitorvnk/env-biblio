<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::post('login', 'App\Http\Controllers\AuthController@login');
Route::post('register', 'App\Http\Controllers\AuthController@register');

Route::middleware('jwt.auth')->group(function () {
    Route::post('logout', 'App\Http\Controllers\AuthController@logout');
    Route::post('refresh', 'App\Http\Controllers\AuthController@refresh');
});

Route::prefix('library')->middleware('jwt.auth')->group(function () {
    Route::apiResource('book', 'App\Http\Controllers\BookController');
    Route::apiResource('customer', 'App\Http\Controllers\CustomerController');
    Route::apiResource('category', 'App\Http\Controllers\CategoryController');
    Route::apiResource('rended-book', 'App\Http\Controllers\RendedBookController');
});
