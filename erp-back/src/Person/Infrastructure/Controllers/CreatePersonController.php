<?php

use App\Http\Controllers\Controller;
use Src\Person\Domain\Repositories\PersonRepository;
use Illuminate\Http\Request;

class CreatePersonController extends Controller
{
    private PersonRepository $repository;

    public function __construct(PersonRepository $repository)
    {
        $this->repository = $repository;
    }

    public function __invoke(Request $request): void
    {

    }

}
