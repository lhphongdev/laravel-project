<?php

use App\Http\Controllers\AuthController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DepartmentController;
use App\Http\Controllers\StaffController;

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

Route::post('login', [AuthController::class, 'login']);

// API CRUD for departments
Route::get('departments', [DepartmentController::class, 'index']);
Route::post('departments', [DepartmentController::class, 'store']);
Route::put('departments/{id}', [DepartmentController::class, 'update']);
Route::delete('departments/{id}', [DepartmentController::class, 'destroy']);

// API CRUD for staffs
Route::get('staffs', [StaffController::class, 'index']); // get all staffs
Route::get('staffs/department/{id}', [StaffController::class, 'getStaffsByDepartment']); // get staffs by department
Route::post('staffs', [StaffController::class, 'store']);
Route::put('staffs/{id}', [StaffController::class, 'update']);
Route::delete('staffs/{id}', [StaffController::class, 'destroy']);
