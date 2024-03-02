<?php

use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\GeneralController;
use App\Http\Controllers\Api\UsersController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::post('/login', [AuthController::class, 'login'])->name('login');
Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
Route::middleware('auth:sanctum')->group(function () {
    //aplikasi
    Route::get('/checkLogin', [AuthController::class, 'checkLogin'])->name('checkLogin');
    Route::get('/users', [UsersController::class, 'users'])->name('users');
    Route::post('/users-add', [UsersController::class, 'users'])->name('users.search');
    Route::delete('/users-delete/{id}', [UsersController::class, 'users'])->name('users.delete');

    //GeneralController
    Route::get('/getRole', [GeneralController::class, 'getRole'])->name('getRole');
    Route::get('/getProvince', [GeneralController::class, 'getProvince'])->name('getProvince');
    Route::get('/getRegency/{id}', [GeneralController::class, 'getRegency'])->name('getRegency');
    Route::get('/getDistrict/{id}', [GeneralController::class, 'getDistrict'])->name('getDistrict');
    Route::get('/getVillage/{id}', [GeneralController::class, 'getVillage'])->name('getVillage');
});
