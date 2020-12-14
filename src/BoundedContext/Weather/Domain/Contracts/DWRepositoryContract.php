<?php

declare(strict_types=1);

namespace Src\BoundedContext\Weather\Domain\Contracts;

use Src\BoundedContext\Weather\Domain\DW;
use Src\BoundedContext\Weather\Domain\ValueObjects\DWId;
use Src\BoundedContext\Weather\Domain\ValueObjects\DWName;
use Src\BoundedContext\Weather\Domain\ValueObjects\DWTime;
use Src\BoundedContext\Weather\Domain\ValueObjects\DWWeather;

interface DWRepositoryContract
{
    // public function find(DWId $id): ?DW;
// 
    public function find();

    public function findByCriteria(DWName $dwName, DWTime $dwTime): ?DW;

    public function save(DW $dw): void;

    // public function update(DWId $dwId, DW $dw): void;

    // public function delete(DWId $dwId): void;
}
