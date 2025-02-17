<?php

namespace Src\Auth\Infrastructure\Controllers;

use Src\Auth\Application\UseCase\LogoutUseCase;
class AuthLogoutController
{
    public function __invoke():void
    {
        $useCase = new LogoutUseCase();
        $useCase();
    }
}
