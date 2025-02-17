<?php

namespace Src\Auth\Application\UseCase;

use Src\Shared\Facades\AuthUser;

class LogoutUseCase
{
    public function __invoke():void
    {
        AuthUser::logout();
    }

}
