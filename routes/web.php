<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\LogoutController;
use App\Http\Controllers\Admin\ApplicationController;
use App\Http\Controllers\Admin\DetailController;
use App\Http\Controllers\Admin\HomeController;
use App\Http\Controllers\Admin\OfficeController;
use App\Http\Controllers\Admin\ReviewController;
use App\Http\Controllers\Admin\ServicesController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\User\FeedbackController;
use App\Http\Controllers\User\IndexController;
use App\Http\Controllers\User\PriceController;
use App\Http\Controllers\User\StatusController;

Route::get('/login', [LoginController::class, 'create'])
    ->name('login');
Route::post('/login', [LoginController::class, 'authenticate'])
    ->name('login');

Route::post('/logout', [LogoutController::class, 'logout'])
    ->name('logout')->middleware('auth');

$groupAdminData = [
    'prefix' => 'admin',
    'as' => 'admin.',
    'middleware' => 'auth',
];

Route::group(
    $groupAdminData,
    function () {
        Route::middleware(['can:admin'])->group(function () {
            Route::get('/home', [HomeController::class, 'index'])
                ->name('home');
            Route::resource('services', ServicesController::class);
            Route::resource('reviews', ReviewController::class);
            Route::resource('offices', OfficeController::class);
            Route::resource('users', UserController::class);
            Route::resource('details', DetailController::class);
        });
        Route::resource('applications', ApplicationController::class);
    }
);

$groupUserData = [
    'as' => 'user.',
];

Route::group(
    $groupUserData,
    function () {
        Route::get('/', [IndexController::class, 'index'])
            ->name('index');
        Route::get('/price', [PriceController::class, 'index'])
            ->name('price');
        Route::get('/status', [StatusController::class, 'index'])
            ->name('status');
        Route::post('/status', [StatusController::class, 'status'])
            ->name('status');
        Route::resource('feedbacks', FeedbackController::class)
            ->only('create', 'store');
    }
);
