<?php

namespace Src\Auth\Infrastructure\Repositories;

use App\Models\User;
use Carbon\Carbon;
use Src\Auth\Domain\Repositories\AuthRepository;
use Src\Auth\Domain\ValueObjects\LastLogin;
use Src\Auth\Domain\ValueObjects\Password;
use Src\Auth\Domain\ValueObjects\Username;
use Src\Auth\Infrastructure\Mappers\UserMapper;
use Src\Shared\ValueObjects\Active;
use Src\Shared\ValueObjects\IdPersona;

class AuthEloquentRepository implements AuthRepository
{

    public function findByUsername(Username $username,Password $password): ?\Src\Auth\Domain\Entities\User
    {
        $userModel = User::where('username', $username->getValue())
            ->where('active',true)
            ->first();
        if ($userModel && password_verify($password->getValue(),$userModel->password))  {
            $userModel->last_login = Carbon::now();
            $userModel->save();
            return UserMapper::fromObjectToEntity($userModel);
        }
        return null;
    }
}
