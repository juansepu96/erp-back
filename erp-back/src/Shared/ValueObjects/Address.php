<?php

namespace Src\Shared\ValueObjects;

readonly class Address
{
    private Street $street;
    private Number $number;
    private ?Floor $floor;
    private ?Door $doorNumber;

    public function __construct(
        Street     $street,
        Number     $number,
        Floor      $floor = null,
        Door $doorNumber = null
    ) {
        $this->street = $street;
        $this->number = $number;
        $this->floor = $floor;
        $this->doorNumber = $doorNumber;
    }

    public function getStreet(): Street
    {
        return $this->street;
    }

    public function getNumber(): Number
    {
        return $this->number;
    }

    public function getFloor(): ?Floor
    {
        return $this->floor;
    }

    public function getDoorNumber(): ?Door
    {
        return $this->doorNumber;
    }
}
