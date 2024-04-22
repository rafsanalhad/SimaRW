<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\WargaController;
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
    Route::get('/kelola-bansos', [AdminController::class, 'kelolaBansos']);
});
Route::prefix('warga')->group(function () {
    Route::get('/', [WargaController::class, 'index']);
    Route::get('/bayar-iuran', [WargaController::class, 'bayarIuran']);
    Route::get('/kegiatan-warga', [WargaController::class, 'kegiatanWarga']);
    Route::get('/umkm', [WargaController::class, 'umkm']);
    Route::get('/edit-profil', [WargaController::class, 'editProfil']);
    Route::get('/pengajuan-bansos', [WargaController::class, 'pengajuan-bansos']);
    Route::get('/pengaduan', [WargaController::class, 'pengaduan']);
    Route::get('/laporan-iuran', [WargaController::class, 'laporan-iuran']);
});
