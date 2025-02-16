<?php

namespace Src\Auth\Application\Mappers;

use Src\Auth\Domain\Entities\User;

class UserMapper
{
    public static function fromEntityToArray(User $user): array
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
