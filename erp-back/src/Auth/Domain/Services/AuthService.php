<?php

namespace Src\Auth\Domain\Services;

use Src\Auth\Domain\Entities\User;
use Src\Auth\Domain\Repositories\AuthRepository;
use Src\Auth\Domain\ValueObjects\Password;
use Src\Auth\Domain\ValueObjects\Username;
use Src\Shared\Facades\AuthUser;

class AuthService
{
    protected User $user;
    private AuthRepository $repository;

    public function __construct(
        AuthRepository $repository
    ) {
        $this->repository = $repository;
    }

    public function findByUsername(Username $username, Password $password): ?User
    {
        return $this->repository->findByUsername($username, $password);
    }

    public function generateToken(User $user): string
    {
        return $this->repository->generateToken($user);
    }

    public function logout(string $token): void
    {
        $this->repository->removeToken($token);
    }
    public function validateToken(string $token): void
    {
        $this->repository->validateToken($token);
    }
    public function getUser(): ?User
    {
        return $this->user;
    }
    public function Id(): int
    {
        return $this->getUser()->getIdUser()->getValue();
    }

    public function IdPerson(): int
    {
        return $this->getUser()->getIdPersona()->getValue();
    }

    public function Name(): string
    {
        return $this->getUser()->getName()->getValue();
    }

    public function Lastname(): string
    {
        return $this->getUser()->getLastName()->getValue();
    }
    public function Role(): string
    {
        return $this->getUser()->getRole()->getValue()->name;
    }


}
