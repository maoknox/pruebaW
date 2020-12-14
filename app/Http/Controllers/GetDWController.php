<?php

namespace App\Http\Controllers;

use App\Http\Resources\DWResource;
use Illuminate\Http\Request;

class GetDWController extends Controller
{
    /**
     * @var \Src\BoundedContext\User\Infrastructure\GetUserController
     */
    private $getDWController;

    public function __construct(\Src\BoundedContext\Weather\Infrastructure\GetDWController $getDWController)
    {
        $this->getDWController = $getDWController;
    }

    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    // public function __invoke(Request $request)
    // {
    //     $dw = new DWResource($this->getDWController->__invoke($request));
    //     return response($dw, 201);
    //     // return response()->json($user);
    // }
    public function __invoke(Request $request)
    {
        // $dw = new DWResource($this->getDWController->__invoke());
        return response($this->getDWController->__invoke(), 201);
        // return response()->json($user);
    }
}
