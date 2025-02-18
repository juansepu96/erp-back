<?php

namespace Src\Auth\Application\UseCase;

use Src\Auth\Domain\Services\AuthService;
use Src\Shared\Facades\AuthUser;

class LogoutUseCase
{
    private AuthService $authService;
    public function __construct(
        AuthService $authService
    ) {
        $this->authService = $authService;
    }
    public function __invoke(string $token): void
    {
        $this->authService->logout($token);
    }

}
