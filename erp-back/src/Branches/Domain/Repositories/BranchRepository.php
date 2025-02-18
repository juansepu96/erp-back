<?php

namespace Src\Branches\Domain\Repositories;

use Src\Branches\Domain\Entities\Branch;

interface BranchRepository
{
    public function create(Branch $branch): void;
}
