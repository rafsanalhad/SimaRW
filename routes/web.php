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
Route::get('/login', [HomeController::class, 'login']);
Route::get('/forgot-password', [HomeController::class, 'forgotPassword']);
Route::get('/new-password', [HomeController::class, 'newPassword']);
Route::get('/kode-verif', [HomeController::class, 'kodeVerif']);


Route::prefix('admin')->group(function () {
    Route::get('/', [AdminController::class, 'index']);
    Route::get('/dashboard', [AdminController::class, 'index']);
    Route::get('/kelola-warga', [AdminController::class, 'kelolaWarga']);
    Route::post('/kelola-warga', [AdminController::class, 'createWarga'])->name('createWarga');
    Route::get('/kelola-warga/edit/{id}', [AdminController::class, 'editWarga']);
    Route::get('/kelola-warga/delete/{id}', [AdminController::class, 'deleteWarga']);
    Route::post('/kelola-warga/update/{id}', [AdminController::class, 'updateWarga'])->name('updateWarga');
    Route::get('/kelola-rt', [AdminController::class, 'kelolaRt']);
    Route::post('kelola-rt', [AdminController::class, 'createRt']);
    Route::get('/kelola-rt/edit/{id}', [AdminController::class, 'editRt']);
    Route::post('/kelola-rt/update', [AdminController::class, 'updateRt']);
    Route::get('/kelola-rt/delete/{id}', [AdminController::class, 'deleteRt']);
    Route::get('/kelola-rw', [AdminController::class, 'kelolaRw']);
    Route::get('/kelola-umkm', [AdminController::class, 'kelolaUmkm']);
    Route::get('/kelola-iuran', [AdminController::class, 'kelolaIuran']);
    Route::get('/laporan-iuran', [AdminController::class, 'laporanIuran']);
    Route::get('/kelola-bansos', [AdminController::class, 'kelolaBansos']);
    Route::get('/kelola-surat', [AdminController::class, 'kelolaSurat']);
    Route::get('/laporan-pengaduan', [AdminController::class, 'laporanPengaduan']);
    Route::get('/history-pengaduan', [AdminController::class, 'historyPengaduan']);
});
Route::prefix('warga')->group(function () {
    Route::get('/', [WargaController::class, 'index']);
    Route::get('/bayar-iuran', [WargaController::class, 'bayarIuran']);
    Route::get('/kegiatan-warga', [WargaController::class, 'kegiatanWarga']);
    Route::get('/umkm', [WargaController::class, 'umkm']);
    Route::get('/profil-warga', [WargaController::class, 'profilWarga']);
    Route::get('/pengajuan-bansos', [WargaController::class, 'pengajuanBansos']);
    Route::get('/pengaduan', [WargaController::class, 'pengaduanWarga']);
    Route::get('/laporan-iuran', [WargaController::class, 'laporanIuran']);
});
