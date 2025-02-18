<?php

namespace Src\Branches\Infrastructure\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\JsonResponse;
use Mockery\Exception;
use Src\Branches\Application\UseCase\CreateBranchUseCase;
use Src\Branches\Domain\Entities\Branch;
use Src\Branches\Domain\Services\BranchService;
use Src\Branches\Infrastructure\Requests\CreateBranchRequest;
use Src\Shared\ValueObjects\Address;
use Src\Shared\ValueObjects\Door;
use Src\Shared\ValueObjects\Floor;
use Src\Shared\ValueObjects\Hours;
use Src\Shared\ValueObjects\Id;
use Src\Shared\ValueObjects\Name;
use Src\Shared\ValueObjects\Number;
use Src\Shared\ValueObjects\Phone;
use Src\Shared\ValueObjects\Street;

class CreateBranchController extends Controller
{
    private BranchService $service;

    public function __construct(
        BranchService $service
    ) {
        $this->service = $service;
    }

    public function __invoke(CreateBranchRequest $request): JsonResponse
    {
        try {
            $branch = new Branch(
                new Name($request->input('name')),
                new Address(
                    new Street($request->input('street')),
                    new Number($request->input('number')),
                    $request->has('floor') ? new Floor((int)($request->input('floor'))) : null,
                    $request->has('door') ? new Door($request->input('door')) : null
                ),
                new Id($request->input('city_id')),
                new Hours($request->input('hours')),
                new Phone($request->input('phone'))
            );
            $useCase = new CreateBranchUseCase($this->service);
            $useCase($branch);
            return response()->json(
                ['message' => 'Sucursal creada con éxito.']
            );
        } catch (Exception $e) {
            return response()->json(['message' => $e->getMessage()], $e->getCode());
        }
    }


}
