<?php

namespace Src\Person\Domain\ValueObjects;

use Carbon\Carbon;

readonly class Birthdate
{
    private string $value;

    public function __construct(Carbon $value)
    {
        $this->value = $value;
    }

    public function getValue(): Carbon
    {
        return $this->value;
    }
}
