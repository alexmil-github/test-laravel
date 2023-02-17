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
Route::get('/home', [\App\Http\Controllers\SiteController::class, 'page_home']);
Route::get('/about', [\App\Http\Controllers\SiteController::class, 'page_about']);
Route::get('/admin', [\App\Http\Controllers\AdminController::class, 'page_index']);
Route::get('/login', [\App\Http\Controllers\SiteController::class, 'loginForm']);
Route::post('/login', [\App\Http\Controllers\SiteController::class, 'login'])->name('login');










