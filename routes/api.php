<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\ParishionersController;
use App\Http\Controllers\LeadersController;
use App\Http\Controllers\AssistantsController;
use App\Http\Controllers\CellsController;

use App\Http\Controllers\EventsController;
use App\Http\Controllers\EventTypesController;

use App\Http\Controllers\CountriesController;
use App\Http\Controllers\StatesController;
use App\Http\Controllers\CitiesController;

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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('parishioners', [ParishionersController::class, 'index']);
Route::post('parishioners', [ParishionersController::class, 'store']);

Route::get('leaders', [LeadersController::class, 'index']);
Route::post('leaders', [LeadersController::class, 'store']);

Route::get('assistants', [AssistantsController::class, 'index']);
Route::post('assistants', [AssistantsController::class, 'store']);

Route::get('cells', [CellsController::class, 'index']);
Route::post('cells', [CellsController::class, 'store']);

Route::get('events', [EventsController::class, 'index']);
Route::post('events', [EventsController::class, 'store']);

Route::get('eventtypes', [EventTypesController::class, 'index']);
Route::post('eventtypes', [EventTypesController::class, 'store']);

Route::get('countries', [CountriesController::class, 'index']);
Route::post('countries', [CountriesController::class, 'store']);

Route::get('states', [StatesController::class, 'index']);
Route::post('states', [StatesController::class, 'store']);

Route::get('cities', [CitiesController::class, 'index']);
Route::post('cities', [CitiesController::class, 'store']);