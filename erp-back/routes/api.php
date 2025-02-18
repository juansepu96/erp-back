<?php

use App\Http\Middleware\AuthUserMiddleware;
use Illuminate\Support\Facades\Route;
use Src\Auth\Infrastructure\Controllers\AuthLoginController;
use Src\Auth\Infrastructure\Controllers\AuthLogoutController;
use Src\Branches\Infrastructure\Controllers\CreateBranchController;

Route::post('/login', AuthLoginController::class);

Route::middleware(AuthUserMiddleware::class)->group(function () {
    Route::delete('/logout', AuthLogoutController::class);
    Route::post('/branch', CreateBranchController::class);
});
