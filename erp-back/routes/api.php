<?php

use Illuminate\Support\Facades\Route;
use Src\Auth\Infrastructure\Controllers\AuthController;

Route::post('/login', AuthController::class);

