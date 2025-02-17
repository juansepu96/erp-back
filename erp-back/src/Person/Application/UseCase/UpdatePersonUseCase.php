<?php

namespace Src\Person\Application\UseCase;

use Src\Person\Domain\Entities\Person;
use Src\Person\Domain\Repositories\PersonRepository;

readonly class UpdatePersonUseCase
{
    private PersonRepository $repository;

    public function __construct(
        PersonRepository $repository
    ) {
        $this->repository = $repository;
    }

    public function __invoke(Person $person): void
    {
        $this->repository->Update($person);
    }
}
