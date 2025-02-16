<?php

namespace Src\Shared\ValueObjects;

readonly class IdPersona
{
   private int $value;

   public function __construct(int $value)
   {
       $this->value = $value;
   }

    public function getValue():int
   {
       return $this->value;
   }
}
