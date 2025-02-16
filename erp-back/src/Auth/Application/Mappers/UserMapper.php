<?php

namespace Src\Auth\Application\Mappers;

use Src\Auth\Domain\Entities\User;
use Src\Auth\Domain\ValueObjects\LastLogin;
use Src\Auth\Domain\ValueObjects\Password;
use Src\Auth\Domain\ValueObjects\Username;
use Src\Shared\ValueObjects\Active;
use Src\Shared\ValueObjects\IdPersona;

class UserMapper
{
    public static function fromEntityToArray(User $user):array
    {
        return [
            $user->getIdPersona()->getValue(),
            $user->getUsername()->getValue(),
            $user->getPassword()->getValue(),
            $user->getLastLogin()->getValue(),
            $user->getActive()->getValue()
        ];
    }
}
