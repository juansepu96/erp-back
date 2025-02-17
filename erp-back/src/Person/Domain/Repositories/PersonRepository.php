<?php

namespace Src\Person\Domain\Repositories;

use Src\Person\Domain\Entities\Person;
use Src\Shared\ValueObjects\Id;

interface PersonRepository
{
    public function create(Person $person): void;
    public function update(Person $person): void;
    public function findById(Id $id): ?Person;

}
