<?php

use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\GeneralController;
use App\Http\Controllers\Api\PaketController;
use App\Http\Controllers\Api\UsersController;
use App\Http\Controllers\Api\WilayahController;
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
Route::post('/users-add-register', [AuthController::class, 'register'])->name('register');
Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
Route::get('/getProvince', [GeneralController::class, 'getProvince'])->name('getProvince');
Route::get('/getRegency/{id}', [GeneralController::class, 'getRegency'])->name('getRegency');
Route::get('/getDistrict/{id}', [GeneralController::class, 'getDistrict'])->name('getDistrict');
Route::get('/getVillage/{id}', [GeneralController::class, 'getVillage'])->name('getVillage');

Route::get('/listPaket', [GeneralController::class, 'listPaket'])->name('listPaket');
Route::get('/listPaketDetail/{id}', [GeneralController::class, 'listPaketDetail'])->name('listPaketDetail');

Route::middleware('auth:sanctum')->group(function () {
    //aplikasi
    Route::get('/checkLogin', [AuthController::class, 'checkLogin'])->name('checkLogin');
    Route::get('/users', [UsersController::class, 'users'])->name('users');
    Route::post('/users-add', [UsersController::class, 'users'])->name('users.add');
    Route::patch('/users-edit', [UsersController::class, 'users'])->name('users.edit');
    Route::delete('/users-delete/{id}', [UsersController::class, 'users'])->name('users.delete');

    //GeneralController
    Route::get('/getRole', [GeneralController::class, 'getRole'])->name('getRole');
   
    Route::get('/users-wilayah', [GeneralController::class, 'getUserwilayah'])->name('getUserwilayah');
    
    //wilayah
    Route::get('/wilayah', [WilayahController::class, 'wilayah'])->name('wilayah');
    Route::post('/wilayah-add', [WilayahController::class, 'wilayah'])->name('wilayah.add');
    Route::patch('/wilayah-edit', [WilayahController::class, 'wilayah'])->name('wilayah.edit');
    Route::delete('/wilayah-delete/{id}', [WilayahController::class, 'wilayah'])->name('wilayah.delete');
    
    //paket
    Route::get('/paket', [PaketController::class, 'paket'])->name('paket');
    Route::post('/paket-add', [PaketController::class, 'paket'])->name('paket.add');
    Route::patch('/paket-edit', [PaketController::class, 'paket'])->name('paket.edit');
    Route::delete('/paket-delete/{id}', [PaketController::class, 'paket'])->name('paket.delete');



});
