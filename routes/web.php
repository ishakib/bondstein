<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});
Route::apiResource('posts', App\Http\Controllers\PostController::class);
Route::apiResource('shakibs', App\Http\Controllers\ShakibController::class);

Route::apiResource('comments', App\Http\Controllers\CommentController::class);
