<?php

use App\Http\Controllers\Api\EmployeeController;
use App\Http\Controllers\Api\EmployeeDataController;
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
Route::get('/employees/countries',[EmployeeDataController::class,'countries']);
Route::get('/employees/{country}/states',[EmployeeDataController::class,'states']);
Route::get('/employees/departments',[EmployeeDataController::class,'departments']);
Route::get('/employees/{state}/cities',[EmployeeDataController::class,'cities']);

//Route::post('/employees', [\App\Http\Controllers\Api\EmployeeController::class,'store']);
//Route::get('/employees', [\App\Http\Controllers\Api\EmployeeController::class,'index']);
//Route::delete('/employees/{employee}', [\App\Http\Controllers\Api\EmployeeController::class,'destroy']);

Route::apiResource('employees',EmployeeController::class);
