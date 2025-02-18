<?php

namespace Src\Branches\Application\UseCase;

use Src\Branches\Domain\Entities\Branch;
use Src\Branches\Domain\Services\BranchService;

class CreateBranchUseCase
{
    private BranchService $service;

    public function __construct(
        BranchService $service
    ) {
        $this->service = $service;
    }

    public function __invoke(Branch $branch): void
    {
        $this->service->createBranch($branch);
    }

}
