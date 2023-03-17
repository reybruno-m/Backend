<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\PersonController;
use App\Http\Controllers\PlanetController;
use App\Http\Controllers\VehicleController;

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

Route::get('people', [PersonController::class, 'get']);
Route::get('people/{id}', [PersonController::class, 'getById'])->where('id', '[0-9]+');

Route::get('planets', [PlanetController::class, 'get']);
Route::get('planets/{id}', [PlanetController::class, 'getById'])->where('id', '[0-9]+');

Route::get('vehicles', [VehicleController::class, 'get']);
Route::get('vehicles/{id}', [VehicleController::class, 'getById'])->where('id', '[0-9]+');