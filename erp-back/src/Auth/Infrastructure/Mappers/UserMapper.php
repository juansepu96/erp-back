<?php

namespace Src\Auth\Infrastructure\Mappers;

use App\Models\User as UserModel;
use Src\Auth\Domain\Entities\User;
use Src\Auth\Domain\ValueObjects\LastLogin;
use Src\Auth\Domain\ValueObjects\Lastname;
use Src\Auth\Domain\ValueObjects\Password;
use Src\Auth\Domain\ValueObjects\Role;
use Src\Auth\Domain\ValueObjects\Username;
use Src\Shared\Enums\RoleTypesEnum;
use Src\Shared\ValueObjects\Active;
use Src\Shared\ValueObjects\Id;
use Src\Shared\ValueObjects\Name;

class UserMapper
{
    public static function fromObjectToEntity(UserModel $userModel): User
    {
        return new User(
            new Id($userModel->id),
            new Id($userModel->person_id),
            new Username($userModel->username),
            new Password($userModel->password),
            new LastLogin($userModel->last_login),
            new Active(true),
            new Name($userModel->person->name),
            new Lastname($userModel->person->lastname),
            new Role(RoleTypesEnum::tryFrom($userModel->role_id))
        );
    }
}
