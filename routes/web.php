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

Route::get('/', function () {
    return view('welcome');
});


Route::middleware('guest')->group(function (){
    Route::get('/register', [\App\Http\Controllers\AuthController::class, 'register'])->name('register');
    Route::post('/register', [\App\Http\Controllers\AuthController::class, 'doRegister'])->name('doRegister');
    Route::get('/login', [\App\Http\Controllers\AuthController::class, 'login'])->name('login');
    Route::post('/login', [\App\Http\Controllers\AuthController::class, 'doLogin'])->name('doLogin');
});
Route::middleware('auth')->group(function (){
    Route::get('/logout', [\App\Http\Controllers\AuthController::class, 'logout'])->name('logout');
    Route::get('/dashboard', [\App\Http\Controllers\AuthController::class, 'dashboard'])->name('dashboard');
});

Route::middleware('role:Super Admin')->group(function (){
    Route::resource('users', \App\Http\Controllers\UserController::class);
    Route::resource('categories', \App\Http\Controllers\CategoryController::class);
});


