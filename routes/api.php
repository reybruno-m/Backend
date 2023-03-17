<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\AuthController;

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

Route::group([
    'middleware' => 'api',
    'prefix' => 'auth'
], function ($router) {

    # Auth.
    Route::post('login', [AuthController::class, 'login'])->name('login');
    Route::post('logout', [AuthController::class, 'logout'])->name('logout');
    Route::post('me', [AuthController::class, 'me'])->name('me');

});

Route::group(['middleware' => 'api'], function ($router) {

    # People.
    Route::get('people/p/{page?}', [PersonController::class, 'get'])->where('page', '[0-9]+');
    Route::get('people/{id}', [PersonController::class, 'getById'])->where('id', '[0-9]+');

    # Planets.
    Route::get('planets/p/{page?}', [PlanetController::class, 'get'])->where('page', '[0-9]+');
    Route::get('planets/{id}', [PlanetController::class, 'getById'])->where('id', '[0-9]+');

    # Vehicles.
    Route::get('vehicles/p/{page?}', [VehicleController::class, 'get'])->where('page', '[0-9]+');
    Route::get('vehicles/{id}', [VehicleController::class, 'getById'])->where('id', '[0-9]+');
});