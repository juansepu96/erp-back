<?php

namespace App\Providers\Auth;

use Illuminate\Support\ServiceProvider;
use Src\Auth\Domain\Repositories\AuthRepository;
use Src\Auth\Domain\Services\AuthService;
use Src\Auth\Infrastructure\Repositories\AuthEloquentRepository;

class AuthServiceProvider extends ServiceProvider
{
    public function register(): void
    {
        $this->app->bind(AuthRepository::class, AuthEloquentRepository::class);
        $this->app->singleton('auth-user', function () {
            return new AuthService();
        });
    }
}
