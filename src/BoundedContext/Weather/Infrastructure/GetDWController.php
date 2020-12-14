<?php

declare(strict_types=1);

namespace Src\BoundedContext\Weather\Infrastructure;

use Illuminate\Http\Request;
use Src\BoundedContext\Weather\Application\GetDWUseCase;
use Src\BoundedContext\Weather\Infrastructure\Repositories\EloquentDWRepository;

final class GetDWController
{
    private $repository;

    public function __construct(EloquentDWRepository $repository)
    {
        $this->repository = $repository;
    }

    // public function __invoke(Request $request)
    // {
    //     $dWId = (int)$request->id;

    //     $getDWUseCase = new GetDWUseCase($this->repository);
    //     $dw           = $getDWUseCase->__invoke($dWId);

    //     return $dw;
    // }
    public function __invoke()
    {
        // $dWId = (int)$request->id;

        $getDWUseCase = new GetDWUseCase($this->repository);
        $dw           = $getDWUseCase->__invoke();

        return $dw;
    }
}
