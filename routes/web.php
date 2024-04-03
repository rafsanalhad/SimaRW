<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\HomeController;
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

Route::get('/', [HomeController::class, 'index']);

Route::prefix('admin')->group(function () {
    Route::get('/', [AdminController::class, 'index']);
    Route::get('/dashboard', [AdminController::class, 'index']);
    Route::get('/kelola-warga', [AdminController::class, 'kelolaWarga']);
    Route::get('/kelola-rt', [AdminController::class, 'kelolaRt']);
    Route::get('/kelola-rw', [AdminController::class, 'kelolaRw']);
    Route::get('/kelola-umkm', [AdminController::class, 'kelolaUmkm']);
    Route::get('/kelola-iuran', [AdminController::class, 'kelolaIuran']);
    Route::get('/laporan-iuran', [AdminController::class, 'laporanIuran']);
});
