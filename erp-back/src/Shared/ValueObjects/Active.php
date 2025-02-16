<?php

namespace Src\Shared\ValueObjects;

readonly class Active
{
    private bool $value;

    public function __construct(bool $value)
    {
        $this->value = $value;
    }

    public function getValue(): bool
    {
        return $this->value;
    }

}
