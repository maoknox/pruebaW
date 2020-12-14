<?php

namespace App\Http\Controllers;

use App\Http\Resources\DWResource;
use Illuminate\Http\Request;

class CreateDWController extends Controller
{
    /**
     * @var \Src\BoundedContext\User\Infrastructure\CreateUserController
     */
    private $createDWController;

    public function __construct(\Src\BoundedContext\Weather\Infrastructure\CreateDWController $createDWController)
    {
        $this->createDWController = $createDWController;
    }

    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request)
    {
        $newDW = new DWResource($this->createDWController->__invoke($request));

        return response($newDW, 201);
    }
}
