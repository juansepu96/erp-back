<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
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
        $user = session('user');
        $this->authService->setUser($user);
        dd($this->authService->getUser());
        if (!$this->authService->isLogged()) {
            throw new InvalidCredentialsException();
        }

        return $next($request);
    }
}
