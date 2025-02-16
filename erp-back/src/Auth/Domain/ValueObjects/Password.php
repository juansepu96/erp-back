<?php

namespace Src\Auth\Domain\ValueObjects;

readonly class Password
{
    private string $value;

    public function __construct(string $value)
    {
        $this->value = $value;
    }

    public function getValue(): string
    {
        return $this->value;
    }

}
