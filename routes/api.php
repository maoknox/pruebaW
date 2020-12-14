<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::middleware('auth:api')->get('/weather', function (Request $request) {
    return $request->weather();
});

Route::get('user/{id}', 'GetUserController');
Route::post('user', 'CreateUserController');
Route::put('user/{id}', 'UpdateUserController');
Route::delete('user/{id}', 'DeleteUserController');


// Route::get('weather/{id}', 'GetDWController');
Route::get('weather', 'GetDWController');
Route::post('weather', 'CreateDWController');