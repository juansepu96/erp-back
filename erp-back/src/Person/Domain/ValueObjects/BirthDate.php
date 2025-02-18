<?php

namespace Src\Person\Domain\ValueObjects;

use Carbon\Carbon;

readonly class BirthDate
{
    private Carbon $value;

    public function __construct(Carbon $value)
    {
        $this->value = $value;
    }
    public function getValue(): Carbon
    {
        return $this->value;
    }
}
