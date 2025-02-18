<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Mockery\Exception;
use Src\Auth\Domain\Exceptions\InvalidCredentialsException;
use Src\Auth\Domain\Services\AuthService;
use Symfony\Component\HttpFoundation\Response;

class AuthUserMiddleware
{
    protected AuthService $authService;

    public function __construct(AuthService $authService)
    {
        $this->authService = $authService;
    }

    /**
     * Handle an incoming request.
     *
     * @param Request $request
     * @param Closure $next
     * @return Response
     * @throws InvalidCredentialsException
     */
    public function handle(Request $request, Closure $next): Response
    {
        try {
            $authorizationHeader = $request->header('Authorization');
            if ($authorizationHeader && str_starts_with($authorizationHeader, 'Bearer '))
            {
                $token = substr($authorizationHeader, 7);
                $this->authService->validateToken($token);
                return $next($request);
            }
            throw new InvalidCredentialsException();
        } catch (Exception $e) {
            throw new Exception($e->getMessage());
        }
    }
}
