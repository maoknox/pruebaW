<?php

declare(strict_types=1);

namespace Src\BoundedContext\Weather\Domain;

use Src\BoundedContext\Weather\Domain\ValueObjects\DWName;
use Src\BoundedContext\Weather\Domain\ValueObjects\DWTime;
use Src\BoundedContext\Weather\Domain\ValueObjects\DWWeather;

final class DW
{
    private $name;
    private $time;
    private $weather;

    public function __construct(
        DWName $name,
        DWTime $time,
        DWWeather $weather
    )
    {
        $this->name              = $name;
        $this->time             = $time;
        $this->weather = $weather;
    }

    public function name(): DWName
    {
        return $this->name;
    }

    public function time(): DWTime
    {
        return $this->time;
    }

    

    public function weather(): DWWeather
    {
        return $this->weather;
    }

    

    public static function create(
         DWName $name,
        DWTime $time,
        DWWeather $weather
    ): DW
    {
        $dw = new self($name, $time, $weather);

        return $dw;
    }
}
