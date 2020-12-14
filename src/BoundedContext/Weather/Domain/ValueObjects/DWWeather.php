<?php

declare(strict_types=1);

namespace Src\BoundedContext\Weather\Domain\ValueObjects;

final class DWWeather
{
    private $value;

    public function __construct(string $weather)
    {
        $this->value = $weather;
    }

    public function value(): string
    {
        return $this->value;
    }
}
