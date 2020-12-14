<?php

declare(strict_types=1);

namespace Src\BoundedContext\Weather\Domain\ValueObjects;

use DateTime;

final class DWTime
{
    private $value;

    public function __construct(string $time)
    {
        $this->value = $time;
    }

    public function value(): string
    {
        return $this->value;
    }
}
