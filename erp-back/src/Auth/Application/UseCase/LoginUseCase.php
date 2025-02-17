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
    private AuthRepository $repository;
    private AuthService $authService;

    public function __construct(
        AuthRepository $repository,
        AuthService $authService
    ) {
        $this->repository = $repository;
        $this->authService = $authService;
    }

    /**
     * @throws InvalidCredentialsException
     */
    public function __invoke(Username $username, Password $password): array
    {
        $user = $this->repository->findByUsername($username, $password);
        if (!$user) {
            throw new InvalidCredentialsException();
        }
        $this->authService->setUser($user);
        session(['user' => $user]);
        return UserMapper::fromEntityToArray($user);
    }

}
