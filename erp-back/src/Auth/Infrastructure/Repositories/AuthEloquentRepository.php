<?php

namespace Src\Auth\Infrastructure\Repositories;

use App\Models\Token;
use App\Models\User;
use Carbon\Carbon;
use Http\Client\Exception;
use Illuminate\Support\Str;
use Src\Auth\Domain\Exceptions\InvalidCredentialsException;
use Src\Auth\Domain\Repositories\AuthRepository;
use Src\Auth\Domain\ValueObjects\Password;
use Src\Auth\Domain\ValueObjects\Username;
use Src\Auth\Infrastructure\Mappers\UserMapper;
use Src\Shared\ValueObjects\Id;

class AuthEloquentRepository implements AuthRepository
{
    public function findByUsername(Username $username, Password $password): ?\Src\Auth\Domain\Entities\User
    {
        $userModel = User::with('Person')
            ->with('Role')
            ->where('username', $username->getValue())
            ->where('active', true)
            ->first();
        if ($userModel && password_verify($password->getValue(), $userModel->password)) {
            $userModel->last_login = Carbon::now();
            $userModel->save();
            return UserMapper::fromObjectToEntity($userModel);
        }
        return null;
    }

    /**
     * @throws InvalidCredentialsException
     */
    public function generateToken(\Src\Auth\Domain\Entities\User $user): string
    {
        try {
            $this->endCurrentSession($user->getIdUser());
            $token = new Token();
            $token -> id = $user->getIdUser()->getValue();
            $token -> token = Str::random(32);
            $token -> expires_at = Carbon::now()->addHours(6);
            $token -> save();
            return $token -> token;
        } catch (Exception $e) {
            throw new InvalidCredentialsException();
        }
    }

    /**
     * @throws InvalidCredentialsException
     */
    public function removeToken(string $token): void
    {
        try {
            $token = new Token();
            $token = $token->where('token', $token)->first();
            if ($token) {
                $token->delete();
            }
        } catch (Exception $e) {
            throw new InvalidCredentialsException();
        }
    }

    /**
     * @throws InvalidCredentialsException
     */
    public function validateToken(string $token): void
    {
        try {
            $token  = new Token();
            $token = $token->where('token', $token)->first();
            if (!$token || $token->expires_at < Carbon::now()) {
                throw new InvalidCredentialsException();
            }
        } catch (Exception $e) {
            throw new InvalidCredentialsException();
        }
    }

    /**
     * @throws InvalidCredentialsException
     */
    private function endCurrentSession(Id $userId): void
    {
        try {
            $token  = new Token();
            $token = $token->find($userId->getValue());
            if ($token) {
                $token->delete();
            }
        } catch (Exception $e) {
            throw new InvalidCredentialsException();
        }
    }
}
