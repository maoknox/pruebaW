<?php

declare(strict_types=1);

namespace Src\BoundedContext\Weather\Application;

use DateTime;
use Src\BoundedContext\Weather\Domain\Contracts\DWRepositoryContract;
use Src\BoundedContext\Weather\Domain\DW;
use Src\BoundedContext\Weather\Domain\ValueObjects\DWId;
use Src\BoundedContext\Weather\Domain\ValueObjects\DWName;
use Src\BoundedContext\Weather\Domain\ValueObjects\DWTime;
use Src\BoundedContext\Weather\Domain\ValueObjects\DWWeather;

final class CreateDWUseCase
{
    private $repository;

    public function __construct(DWRepositoryContract $repository)
    {
        $this->repository = $repository;
    }

    public function __invoke(
        string $dWName,
        string $dWTime,
        string $dWWeather
    ): void
    {
        $name = new DWName($dWName);
        $time = new DWTime($dWTime);
        $weather = new DWWeather($dWWeather);

        $dw = DW::create($name, $time, $weather);

        $this->repository->save($dw);
    }
}
