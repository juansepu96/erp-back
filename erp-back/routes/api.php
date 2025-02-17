<?php

use App\Http\Middleware\AuthUserMiddleware;
use Illuminate\Support\Facades\Route;
use Src\Auth\Infrastructure\Controllers\AuthLoginController;
use Src\Auth\Infrastructure\Controllers\AuthLogoutController;

Route::post('/login', AuthLoginController::class);

Route::middleware(AuthUserMiddleware::class)->group(function () {
    Route::delete('/logout', AuthLogoutController::class);
    Route::get('/user', function(){
        dd('Funciona la ruta');
    });
});
