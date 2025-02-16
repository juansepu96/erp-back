<?php

namespace Src\Auth\Infrastructure\Mappers;

use Carbon\Carbon;
use Src\Auth\Domain\Entities\User;
use Src\Auth\Domain\ValueObjects\LastLogin;
use Src\Auth\Domain\ValueObjects\Password;
use Src\Auth\Domain\ValueObjects\Username;
use Src\Shared\ValueObjects\Active;
use Src\Shared\ValueObjects\IdPersona;
use App\Models\User as UserModel;

class UserMapper
{
    public static function fromObjectToEntity(UserModel $userModel): User
    {
        return new User(
            new IdPersona($userModel->person_id),
            new Username($userModel->username),
            new Password($userModel->password),
            new LastLogin($userModel->last_login),
            new Active(true)
        );
    }
}
