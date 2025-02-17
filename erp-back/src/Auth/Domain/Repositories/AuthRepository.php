<?php

namespace Src\Auth\Domain\Repositories;

use Src\Auth\Domain\Entities\User;
use Src\Auth\Domain\ValueObjects\Password;
use Src\Auth\Domain\ValueObjects\Username;

interface AuthRepository
{
    public function findByUsername(Username $username, Password $password): ?User;

    public function generateToken(User $user): string;

    public function removeToken(string $token): void;

    public function validateToken(string $token): void;

}
