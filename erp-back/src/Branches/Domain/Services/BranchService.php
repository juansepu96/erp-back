<?php

namespace Src\Branches\Domain\Services;

use Src\Branches\Domain\Entities\Branch;
use Src\Branches\Domain\Repositories\BranchRepository;

class BranchService
{
    private BranchRepository $repository;

    public function createBranch(Branch $branch): void
    {
        $this->repository->create($branch);
    }

}
