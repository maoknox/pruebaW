<?php

declare(strict_types=1);

namespace Src\BoundedContext\Weather\Application;

use Src\BoundedContext\Weather\Domain\Contracts\DWRepositoryContract;
use Src\BoundedContext\Weather\Domain\DW;
use Src\BoundedContext\Weather\Domain\ValueObjects\DWId;

final class GetDWUseCase
{
    private $repository;

    public function __construct(DWRepositoryContract $repository)
    {
        $this->repository = $repository;
    }

    // public function __invoke(int $dWId): ?DW
    // {
    //     $id = new DWId($dWId);

    //     $dw = $this->repository->find($id);

    //     return $dw;
    // }
     public function __invoke()
    {
        // $id = new DWId($dWId);

        $dw = $this->repository->find();

        return $dw;
    }
}
