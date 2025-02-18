<?php

namespace App\Providers\Branch;

use Illuminate\Support\ServiceProvider;
use Src\Branches\Domain\Repositories\BranchRepository;
use Src\Branches\Infrastructure\Repositories\BranchEloquentRepository;

class BranchServiceProvider extends ServiceProvider
{
    public function register(): void
    {
        $this->app->bind(BranchRepository::class, BranchEloquentRepository::class);
    }
}
