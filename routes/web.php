<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\PetugasTamuController;
use App\Http\Controllers\TamuController;
use App\Http\Controllers\BulananController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/', [AuthController::class, 'login']);
Route::post('login', [AuthController::class, 'AuthLogin']);
Route::get('logout', [AuthController::class, 'logout']);
Route::get('forgot-password', [AuthController::class, 'ForgotPassword']);
Route::post('forgot-password', [AuthController::class, 'PostForgotPassword']);
Route::get('reset/{token}', [AuthController::class, 'reset']);
Route::post('reset/{token}', [AuthController::class, 'PostReset']);

// Laporan Bulanan & Cetak
Route::get('bulanan', [BulananController::class, 'index'])->name('bulanan.index');
Route::get('bulanan/detail/{bulan}', [BulananController::class, 'show'])->name('bulanan.show');
Route::get('bulanan/cetak/{bulan}', [BulananController::class, 'cetak'])->name('bulanan.cetak');


// Admin
Route::group(['middleware' => 'admin'], function () {

    Route::get('admin/dashboard', [DashboardController::class, 'dashboard']);

    Route::get('admin/user/list', [AdminController::class, 'list']);
    Route::post('admin/user/add', [AdminController::class, 'insert']);
    Route::post('admin/user/edit/{id}', [AdminController::class, 'update']);
    Route::get('admin/user/delete/{id}', [AdminController::class, 'delete'])->name('user.delete');

    // Tamu
    Route::get('admin/tamu/list', [TamuController::class, 'list']);

});

// Petugas
Route::group(['middleware' => 'petugas'], function () {

    Route::get('petugas/dashboard', [DashboardController::class, 'dashboard']);

    Route::get('petugas/tamu/list', [PetugasTamuController::class, 'list']);
    Route::post('petugas/tamu/add', [PetugasTamuController::class, 'insert']);
    Route::post('petugas/tamu/edit/{id}', [PetugasTamuController::class, 'update']);
    Route::get('petugas/tamu/delete/{id}', [PetugasTamuController::class, 'delete'])->name('tamu.delete');

});
