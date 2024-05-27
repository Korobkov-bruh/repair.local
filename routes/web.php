<?php

use App\Http\Controllers\ApplicationController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\LogoutController;
use App\Http\Controllers\DetailController;
use App\Http\Controllers\OfficeController;
use App\Http\Controllers\ReviewController;
use App\Http\Controllers\ServicesController;
use App\Http\Controllers\UserController;
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

// Администратор
Route::resource('services', ServicesController::class)
    ->middleware('auth');

// Администратор
Route::resource('reviews', ReviewController::class)
    ->middleware('auth', 'can:admin');

Route::resource('offices', OfficeController::class)
    ->middleware('auth', 'can:admin');

Route::resource('users', UserController::class)
    ->middleware('auth', 'can:admin');
// Сотрудники
Route::resource('applications', ApplicationController::class)
    ->middleware('auth');

Route::resource('details', DetailController::class)
    ->middleware('auth', 'can:admin');
