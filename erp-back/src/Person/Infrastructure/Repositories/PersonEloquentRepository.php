<?php

namespace Src\Person\Infrastructure\Repositories;

use Illuminate\Database\QueryException;
use Src\Auth\Domain\Exceptions\InvalidCredentialsException;
use Src\Person\Domain\Entities\Person;
use Src\Person\Domain\Repositories\PersonRepository;
use App\Models\Person as PersonModel;
use Src\Shared\ValueObjects\Id;

class PersonEloquentRepository implements PersonRepository
{
    public function create(Person $person): void
    {
        try {
            $personModel = new PersonModel();

            $personModel->name = $person->getName();
            $personModel->lastname = $person->getLastname();
            $personModel->document = $person->getDocument();
            $personModel->birthdate = $person->getBirthdate();
            $personModel->email = $person->getEmail();
            $personModel->phone = $person->getPhone();
            $personModel->address = $person->getAddress();
            $personModel->note = $person->getNote();

            $personModel->save();

        } catch (QueryException $e) {
            //crear la excepcion
        }
    }

    public function update(Person $person): void
    {
    }

    public function findById(Id $id): ?Person
    {
        return null;
    }
}
