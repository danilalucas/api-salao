<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\ServiceController;
use App\Http\Controllers\ClientController;
use App\Http\Controllers\ScheduleController;

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

Route::prefix('employee')->group(function () {
    Route::post('/', [EmployeeController::class, 'create']);
    Route::patch('/{cpf}', [EmployeeController::class, 'update']);
    Route::put('/active', [EmployeeController::class, 'active']);
    Route::put('/inactive', [EmployeeController::class, 'inactive']);
    Route::get('/', [EmployeeController::class, 'read']);
    Route::get('/{cpf}', [EmployeeController::class, 'readByCpf']);
});

Route::prefix('service')->group(function () {
    Route::post('/', [ServiceController::class, 'create']);
    Route::patch('/{id}', [ServiceController::class, 'update']);
    Route::put('/active', [ServiceController::class, 'active']);
    Route::put('/inactive', [ServiceController::class, 'inactive']);
    Route::get('/', [ServiceController::class, 'read']);
    Route::get('/{id}', [ServiceController::class, 'readById']);
});

Route::prefix('client')->group(function () {
    Route::post('/', [ClientController::class, 'create']);
    Route::patch('/{id}', [ClientController::class, 'update']);
    Route::put('/active', [ClientController::class, 'active']);
    Route::put('/inactive', [ClientController::class, 'inactive']);
    Route::get('/', [ClientController::class, 'read']);
    Route::get('/{id}', [ClientController::class, 'readById']);
});

Route::prefix('schedule')->group(function () {
    Route::post('/', [ScheduleController::class, 'create']);
    Route::patch('/{id}', [ScheduleController::class, 'update']);
    Route::get('/', [ScheduleController::class, 'read']);
    Route::get('/{id}', [ScheduleController::class, 'readById']);
    Route::delete('/{id}', [ScheduleController::class, 'delete']);
});