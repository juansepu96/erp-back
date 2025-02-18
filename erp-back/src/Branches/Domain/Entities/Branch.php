<?php

namespace Src\Branches\Domain\Entities;

use Src\Shared\ValueObjects\Address;
use Src\Shared\ValueObjects\Hours;
use Src\Shared\ValueObjects\Id;
use Src\Shared\ValueObjects\Name;
use Src\Shared\ValueObjects\Phone;

readonly class Branch
{
    private Name $name;
    private Address $address;
    private Id $city_id;
    private Hours $hours;
    private Phone $phone;

    public function __construct(
        Name $name,
        Address $address,
        Id $city_id,
        Hours $hours,
        Phone $phone
    ) {
        $this->name = $name;
        $this->address = $address;
        $this->city_id = $city_id;
        $this->hours = $hours;
        $this->phone = $phone;
    }

    public function getName(): Name
    {
        return $this->name;
    }

    public function getAddress(): Address
    {
        return $this->address;
    }

    public function getCityId(): Id
    {
        return $this->city_id;
    }

    public function getHours(): Hours
    {
        return $this->hours;
    }

    public function getPhone(): Phone
    {
        return $this->phone;
    }
}
