<?php

namespace Src\Person\Domain\ValueObjects;

readonly class DoorNumber
{
    private string $value;

    public function __construct(int $value)
    {
        $this->value = $value;
    }

    public function getValue(): int
    {
        return $this->value;
    }
}
