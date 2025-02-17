<?php

namespace Src\Auth\Application\UseCase;

use Illuminate\Support\Facades\Auth;
use Src\Auth\Application\Mappers\UserMapper;
use Src\Auth\Domain\Entities\User;
use Src\Auth\Domain\Exceptions\InvalidCredentialsException;
use Src\Auth\Domain\Repositories\AuthRepository;
use Src\Auth\Domain\Services\AuthService;
use Src\Auth\Domain\ValueObjects\Password;
use Src\Auth\Domain\ValueObjects\Username;
use Src\Shared\Facades\AuthUser;

readonly class LoginUseCase
{
    private AuthService $authService;
    public function __construct(
        AuthService $authService
    ) {
        $this->authService = $authService;
    }

    /**
     * @throws InvalidCredentialsException
     */
    public function __invoke(Username $username, Password $password): array
    {
        $user = $this->authService->findByUsername($username, $password);
        if (!$user) {
            throw new InvalidCredentialsException();
        }
        $token = $this->authService->generateToken($user);
        return UserMapper::fromEntityToArray($user, $token);
    }

}
