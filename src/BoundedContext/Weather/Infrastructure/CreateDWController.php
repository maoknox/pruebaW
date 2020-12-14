<?php

declare(strict_types=1);

namespace Src\BoundedContext\Weather\Infrastructure;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Src\BoundedContext\Weather\Application\CreateDWUseCase;
use Src\BoundedContext\Weather\Application\GetDWByCriteriaUseCase;
use Src\BoundedContext\Weather\Infrastructure\Repositories\EloquentDWRepository;

final class CreateDWController
{
    private $repository;

    public function __construct(EloquentDWRepository $repository)
    {
        $this->repository = $repository;
    }

    public function __invoke(Request $request)
    {
        $dWName              = $request->input('name');
        $dWTime           = $request->input('time');
        $dWWeather = $request->input('weather');;
        

        $createUserUseCase = new CreateDWUseCase($this->repository);
        $createUserUseCase->__invoke(
            $dWName,
            $dWTime,
            $dWWeather            
        );

        $getDWByCriteriaUseCase = new GetDWByCriteriaUseCase($this->repository);
        $newDW                 = $getDWByCriteriaUseCase->__invoke($dWName, $dWTime);

        return $newDW;
    }
}
