<?php

use App\Http\Controllers\api\PostController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

//Route::get('/post', [\App\Http\Controllers\PostController::class, 'index']);

Route::get('/post', [PostController::class, 'index']); //Вывод всех постов
Route::get('/post/{post}', [PostController::class, 'show']); //Вывод одного поста
Route::post('/post', [PostController::class, 'store']); //Создание поста
Route::patch('/post/{post}', [PostController::class, 'update']); // Редактирование поста
Route::delete('/post/{post}', [PostController::class, 'destroy']); //Удаление поста
Route::get('/author/{author}/posts', [PostController::class, 'posts']); //вывод постов определенного автора
Route::get('/post/{post}/author', [PostController::class, 'author']); //вывод автора определенного поста

Route::resource('category', \App\Http\Controllers\api\CategoryController::class);

Route::post('/login', [\App\Http\Controllers\api\LoginApiController::class, 'login']);
Route::get('/logout', [\App\Http\Controllers\api\LoginApiController::class, 'logout'])->middleware('auth:api');
