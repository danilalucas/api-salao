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

/*Employee*/
Route::post('/employee', [EmployeeController::class, 'create']);
Route::patch('/employee/{cpf}', [EmployeeController::class, 'update']);
Route::put('/employee/active', [EmployeeController::class, 'active']);
Route::put('/employee/inactive', [EmployeeController::class, 'inactive']);
Route::get('/employee', [EmployeeController::class, 'read']);
Route::get('/employee/{cpf}', [EmployeeController::class, 'readByCpf']);

/*Service*/
Route::post('/service', [ServiceController::class, 'create']);
Route::patch('/service/{id}', [ServiceController::class, 'update']);
Route::put('/service/active', [ServiceController::class, 'active']);
Route::put('/service/inactive', [ServiceController::class, 'inactive']);
Route::get('/service', [ServiceController::class, 'read']);
Route::get('/service/{id}', [ServiceController::class, 'readById']);

/*Client*/
Route::post('/client', [ClientController::class, 'create']);
Route::patch('/client/{id}', [ClientController::class, 'update']);
Route::put('/client/active', [ClientController::class, 'active']);
Route::put('/client/inactive', [ClientController::class, 'inactive']);
Route::get('/client', [ClientController::class, 'read']);
Route::get('/client/{id}', [ClientController::class, 'readById']);

Route::prefix('schedule')->group(function () {
    Route::post('/', [ScheduleController::class, 'create']);
    Route::patch('/{id}', [ScheduleController::class, 'update']);
    Route::get('/', [ScheduleController::class, 'read']);
    Route::get('/{id}', [ScheduleController::class, 'readById']);
    Route::delete('/{id}', [ScheduleController::class, 'delete']);
});