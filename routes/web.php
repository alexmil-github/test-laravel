<?php

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



Route::get('/', [\App\Http\Controllers\SiteController::class, 'page_index']);
Route::get('/about', [\App\Http\Controllers\SiteController::class, 'page_about']);

Route::get('/login', [\App\Http\Controllers\SiteController::class, 'loginForm']);
Route::post('/login', [\App\Http\Controllers\SiteController::class, 'login'])->name('login');
Route::get('/register', [\App\Http\Controllers\SiteController::class, 'registerForm']);
Route::post('/register', [\App\Http\Controllers\SiteController::class, 'register'])->name('register');


Route::middleware('auth')->group(function () {

    Route::get('/logout', [\App\Http\Controllers\SiteController::class, 'logout'])->name('logout');
    Route::resource('post', \App\Http\Controllers\PostController::class );

});

Route::get('/home', [\App\Http\Controllers\SiteController::class, 'page_home'])->name('home')->middleware(['auth','checkblacklist']);

Route::group(['middleware' => ['role:admin']], function () {
    Route::get('/admin', [\App\Http\Controllers\AdminController::class, 'page_index']);
});

Route::get('/error', function () {
   \Illuminate\Support\Facades\Log::error('Вы допустили ошибку!!!', [
       'error' => true,
   ]);
});








