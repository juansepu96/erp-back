<?php

namespace Src\Shared\Facades;

use Illuminate\Support\Facades\Facade;
use Src\Auth\Domain\Entities\User;

/**
 * @method static setUser(?User $user)
 * @method static isLogged()
 * @method static isValidToken(string $token)
 * @method static logout()
 * @method static getUser()
 */
class AuthUser extends Facade
{
    protected static function getFacadeAccessor(): string
    {
        return 'auth-user';
    }
}
