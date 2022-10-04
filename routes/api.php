<?php

use App\Http\Controllers\EmployeeController;
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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::post('/employee', [EmployeeController::class, 'create']);
Route::patch('/employee/{cpf}', [EmployeeController::class, 'update']);
Route::put('/employee/active', [EmployeeController::class, 'active']);
Route::put('/employee/inactive', [EmployeeController::class, 'inactive']);
Route::get('/employee', [EmployeeController::class, 'read']);
Route::get('/employee/{cpf}', [EmployeeController::class, 'readByCpf']);
