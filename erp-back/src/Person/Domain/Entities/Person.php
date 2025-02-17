<?php

namespace Src\Person\Domain\Entities;

use Src\Person\Domain\ValueObjects\Name;
use Src\Person\Domain\ValueObjects\LastName;
use Src\Person\Domain\ValueObjects\Document;
use Src\Person\Domain\ValueObjects\BirthDate;
use Src\Person\Domain\ValueObjects\Email;
use Src\Person\Domain\ValueObjects\Phone;
use Src\Person\Domain\ValueObjects\Address;
use Src\Person\Domain\ValueObjects\Note;
use Src\Shared\ValueObjects\Id;

readonly class Person
{
    private ?Id $id;
    private Name $name;
    private LastName $lastname;
    private Document $document;
    private BirthDate $birthdate;
    private Email $email;
    private Phone $phone;
    private Address $address;
    private Note $note;

    public function __construct(
        Name $name,
        LastName $lastname,
        Document $document,
        Birthdate $birthdate,
        Email $email,
        Phone $phone,
        Address $address,
        Note $note = null,
        Id $id = null
    ) {
        $this->name = $name;
        $this->lastname = $lastname;
        $this->document = $document;
        $this->birthdate = $birthdate;
        $this->email = $email;
        $this->phone = $phone;
        $this->address = $address;
        $this->note = $note;
        $this->id = $id;
    }

    // Getters
    public function getId(): ?Id
    {
        return $this->id;
    }

    public function getName(): Name
    {
        return $this->name;
    }

    public function getLastname(): LastName
    {
        return $this->lastname;
    }

    public function getDocument(): Document
    {
        return $this->document;
    }

    public function getBirthdate(): BirthDate
    {
        return $this->birthdate;
    }

    public function getEmail(): Email
    {
        return $this->email;
    }

    public function getPhone(): Phone
    {
        return $this->phone;
    }

    public function getAddress(): Address
    {
        return $this->address;
    }

    public function getNote(): Note
    {
        return $this->note;
    }
}
