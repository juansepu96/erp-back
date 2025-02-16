<?php

namespace Src\Auth\Domain\ValueObjects;

use Carbon\Carbon;

readonly class LastLogin
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
