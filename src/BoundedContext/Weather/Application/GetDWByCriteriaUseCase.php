<?php

declare(strict_types=1);

namespace Src\BoundedContext\Weather\Application;

use Src\BoundedContext\Weather\Domain\Contracts\DWRepositoryContract;
use Src\BoundedContext\Weather\Domain\DW;
use Src\BoundedContext\Weather\Domain\ValueObjects\DWName;
use Src\BoundedContext\Weather\Domain\ValueObjects\DWTime;

final class GetDWByCriteriaUseCase
{
    private $repository;

    public function __construct(DWRepositoryContract $repository)
    {
        $this->repository = $repository;
    }

    public function __invoke(string $dWName, string $dWTime): ?DW
    {
        $name  = new DWName($dWName);
        $time = new DWTime($dWTime);

        $dw = $this->repository->findByCriteria($name, $time);

        return $dw;
    }
}
