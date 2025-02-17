<?php

namespace Src\Auth\Domain\Exceptions;

use Exception;
use Src\Shared\Enums\StatusCodeEnum;

class InvalidCredentialsException extends Exception
{
    public function __construct(
        $message = "Credenciales inválidas",
        $code = StatusCodeEnum::UNAUTHORIZED->value,
        Exception $previous = null
    ) {
        parent::__construct($message, $code, $previous);
    }
}
