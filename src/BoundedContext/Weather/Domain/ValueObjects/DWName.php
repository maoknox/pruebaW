<?php

declare(strict_types=1);

namespace Src\BoundedContext\Weather\Domain\ValueObjects;

use InvalidArgumentException;

final class DWName
{
    private $value;

    /**
     * DWName constructor.
     * @param string $name
     * @throws InvalidArgumentException
     */
    public function __construct(string $name)
    {
        
        $this->value = $name;
    }

   
    public function value(): string
    {
        return $this->value;
    }
}
