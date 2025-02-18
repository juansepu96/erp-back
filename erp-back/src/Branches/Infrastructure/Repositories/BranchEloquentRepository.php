<?php

namespace Src\Branches\Infrastructure\Repositories;

use Src\Branches\Domain\Entities\Branch;
use Src\Branches\Domain\Repositories\BranchRepository;

class BranchEloquentRepository implements BranchRepository
{
    public function create(Branch $branch): void
    {
        dd('Llegamos, solo queda persisitir');
    }
}
