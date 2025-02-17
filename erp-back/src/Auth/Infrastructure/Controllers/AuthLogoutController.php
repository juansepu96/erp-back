<?php

namespace Src\Auth\Infrastructure\Controllers;

use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Src\Auth\Application\UseCase\LogoutUseCase;
use Src\Auth\Domain\Exceptions\InvalidCredentialsException;
use Src\Auth\Domain\Repositories\AuthRepository;
use Src\Auth\Domain\Services\AuthService;

class AuthLogoutController
{
    private AuthService $service;

    public function __construct(AuthRepository $repository, AuthService $service)
    {
        $this->service = $service;
    }

    /**
     * @throws InvalidCredentialsException
     */
    public function __invoke(Request $request): JsonResponse
    {
        $authorizationHeader = $request->header('Authorization');
        if ($authorizationHeader && str_starts_with($authorizationHeader, 'Bearer ')) {
            $token = substr($authorizationHeader, 7);
            $useCase = new LogoutUseCase(
                $this->service
            );
            $useCase($token);
            return response()->json(
                ['message' => 'Logout exitoso.']
            );
        }
        throw new InvalidCredentialsException();
    }
}
