<?php

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\LogoutController;
use Illuminate\Support\Facades\Route;

/**
 * Web Routes
 */

Route::get('/', function () {
    return view('welcome');
})->name('welcome');

// Базовая аутентификация
Route::get('/login', [LoginController::class, 'create'])
    ->name('login');
Route::post('/login', [LoginController::class, 'authenticate'])
    ->name('login');

Route::post('/logout', [LogoutController::class, 'logout'])
    ->name('logout')->middleware('auth');
