<?php

namespace App\Providers;

use Illuminate\Support\Facades\Gate;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as
ServiceProvider;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * Карта политик приложения.
     *
     * @var array
     */
    protected $policies = [
        //
    ];

    /**
     * Регистрация любых служб аутентификации / авторизации.
     */
    public function boot(): void
    {
        // Шлюз для администратора
        Gate::define('admin', fn ($user) => $user->position == 'admin');
        // Шлюз для продавца
        Gate::define('seller', fn ($user) => $user->position == 'seller');
        // Шлюз для мастера
        Gate::define('master', fn ($user) => $user->position == 'master');
    }
}
