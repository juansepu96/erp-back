<?php

namespace Src\Auth\Application\UseCase;

use Src\Auth\Application\Mappers\UserMapper;
use Src\Auth\Domain\Entities\User;
use Src\Auth\Domain\Exceptions\InvalidCredentialsException;
use Src\Auth\Domain\Repositories\AuthRepository;
use Src\Auth\Domain\ValueObjects\Password;
use Src\Auth\Domain\ValueObjects\Username;

readonly class LoginUseCase
{
    private AuthRepository $repository;

    public function __construct(
        AuthRepository $repository
    ) {
        $this->repository = $repository;
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
        return UserMapper::fromEntityToArray($user);
    }
}
