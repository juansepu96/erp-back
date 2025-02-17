<?php

namespace Src\Auth\Domain\ValueObjects;

use Src\Shared\Enums\RoleTypesEnum;

class Role
{
    private RoleTypesEnum $value;

    public function __construct(RoleTypesEnum $value)
    {
        $this->value = $value;
    }

    public function getValue(): RoleTypesEnum
    {
        return $this->value;
    }
}
