<?php

namespace Src\Auth\Application\Mappers;

use Src\Auth\Domain\Entities\User;

class UserMapper
{
    public static function fromEntityToArray(User $user, string $token): array
    {
        return [
            'id' => $user->getIdUser()->getValue(),
            'person_id' => $user->getIdPersona()->getValue(),
            'name' => $user->getUsername()->getValue(),
            'lastname' => $user->getLastLogin()->getValue(),
            'token' => $token
        ];
    }
}
