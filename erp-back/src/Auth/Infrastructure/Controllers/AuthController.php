<?php

namespace Src\Auth\Infrastructure\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;
use Src\Auth\Application\UseCase\LoginUseCase;
use Src\Auth\Domain\Exceptions\InvalidCredentialsException;
use Src\Auth\Domain\Repositories\AuthRepository;
use Src\Auth\Domain\ValueObjects\Password;
use Src\Auth\Domain\ValueObjects\Username;

class AuthController extends Controller
{
    private AuthRepository $repository;

    public function __construct(AuthRepository $repository)
    {
        $this->repository = $repository;
    }

    public function __invoke(Request $request): JsonResponse
    {
        try {
            $username = new Username($request->input('username'));
            $password = new Password($request->input('password'));
            $useCase = new LoginUseCase(
                $this->repository
            );
            $user = $useCase($username, $password);
            return response()->json(
                ['message' => 'Login exitoso.', 'user' => $user]
            );
        } catch (InvalidCredentialsException $e) {
            return response()->json(['message' => $e->getMessage()], $e->getCode());
        }
    }
}
