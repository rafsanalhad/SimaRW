<?php

use App\Http\Controllers\Admin\KelolaDataController;
use App\Http\Controllers\Admin\UMKMController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\WargaController;
use App\Http\Controllers\rtrw\RtRwController;
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
    Route::get('/dashboard', [AdminController::class, 'index']);
    Route::get('/profil-admin', [AdminController::class, 'profilAdmin']);

    Route::get('/kelola-warga', [KelolaDataController::class, 'kelolaWarga']);
    Route::post('/kelola-warga', [KelolaDataController::class, 'createWarga'])->name('createWarga');
    Route::get('/kelola-warga/edit/{id}', [KelolaDataController::class, 'editWarga']);
    Route::get('/kelola-warga/delete/{id}', [KelolaDataController::class, 'deleteWarga']);
    Route::post('/kelola-warga/update/{id}', [KelolaDataController::class, 'updateWarga'])->name('updateWarga');

    Route::get('/kelola-rt', [KelolaDataController::class, 'kelolaRt']);
    Route::post('kelola-rt', [KelolaDataController::class, 'createRt']);
    Route::get('/kelola-rt/edit/{id}', [KelolaDataController::class, 'editRt']);
    Route::post('/kelola-rt/update', [KelolaDataController::class, 'updateRt']);
    Route::get('/kelola-rt/delete/{id}', [KelolaDataController::class, 'deleteRt']);

    Route::get('/kelola-rw', [KelolaDataController::class, 'kelolaRw']);
    Route::post('/kelola-rw', [KelolaDataController::class, 'createRw'])->name('createRw');
    Route::get('/kelola-rw/edit/{id}', [KelolaDataController::class, 'editRw']);
    Route::post('/kelola-rw/update', [KelolaDataController::class, 'updateRw'])->name('updateRw');
    Route::get('/kelola-rw/delete/{id}', [KelolaDataController::class, 'deleteRw']);

    Route::get('/kelola-umkm', [UMKMController::class, 'kelolaUmkm']);
    Route::post('/kelola-umkm', [UMKMController::class, 'createUmkm'])->name('createUmkm');
    Route::get('/kelola-umkm/edit/{id}', [UMKMController::class, 'editUmkm']);
    Route::post('/kelola-umkm/update/{id}', [UMKMController::class, 'updateUmkm']);
    Route::get('/kelola-umkm/delete/{id}', [UMKMController::class, 'deleteUmkm']);


    Route::get('/kelola-iuran', [AdminController::class, 'kelolaIuran']);
    Route::get('/laporan-iuran', [AdminController::class, 'laporanIuran']);
    Route::get('/kelola-bansos', [AdminController::class, 'kelolaBansos']);
    Route::get('/kelola-surat', [AdminController::class, 'kelolaSurat']);
    Route::get('/laporan-pengaduan', [AdminController::class, 'laporanPengaduan']);
    Route::get('/history-pengaduan', [AdminController::class, 'historyPengaduan']);
});
Route::prefix('warga')->group(function () {
    Route::get('/dashboard', [WargaController::class, 'index']);
    Route::get('/bayar-iuran', [WargaController::class, 'bayarIuran']);
    Route::get('/kegiatan-warga', [WargaController::class, 'kegiatanWarga']);
    Route::get('/umkm', [WargaController::class, 'umkm']);
    Route::get('/profil-warga', [WargaController::class, 'profilWarga']);
    Route::get('/pengajuan-bansos', [WargaController::class, 'pengajuanBansos']);
    Route::get('/pengaduan', [WargaController::class, 'pengaduanWarga']);
    Route::get('/laporan-iuran', [WargaController::class, 'laporanIuran']);
});

Route::prefix('rtrw')->group(function () {
    Route::get('/dashboard', [RtRwController::class, 'index']);

    Route::get('/kelola-warga', [KelolaDataController::class, 'kelolaWarga']);
    Route::post('/kelola-warga', [KelolaDataController::class, 'createWarga'])->name('createWarga');
    Route::get('/kelola-warga/edit/{id}', [KelolaDataController::class, 'editWarga']);
    Route::get('/kelola-warga/delete/{id}', [KelolaDataController::class, 'deleteWarga']);
    Route::post('/kelola-warga/update/{id}', [KelolaDataController::class, 'updateWarga'])->name('updateWarga');

    // Route::get('/kelola-rt', [KelolaDataController::class, 'kelolaRt']);
    // Route::post('kelola-rt', [KelolaDataController::class, 'createRt']);
    // Route::get('/kelola-rt/edit/{id}', [KelolaDataController::class, 'editRt']);
    // Route::post('/kelola-rt/update', [KelolaDataController::class, 'updateRt']);
    // Route::get('/kelola-rt/delete/{id}', [KelolaDataController::class, 'deleteRt']);

    // Route::get('/kelola-rw', [KelolaDataController::class, 'kelolaRw']);
    // Route::post('/kelola-rw', [KelolaDataController::class, 'createRw'])->name('createRw');
    // Route::get('/kelola-rw/edit/{id}', [KelolaDataController::class, 'editRw']);
    // Route::post('/kelola-rw/update', [KelolaDataController::class, 'updateRw'])->name('updateRw');
    // Route::get('/kelola-rw/delete/{id}', [KelolaDataController::class, 'deleteRw']);

    // Route::get('/kelola-umkm', [UMKMController::class, 'kelolaUmkm']);
    // Route::post('/kelola-umkm', [UMKMController::class, 'createUmkm'])->name('createUmkm');
    // Route::get('/kelola-umkm/edit/{id}', [UMKMController::class, 'editUmkm']);
    // Route::post('/kelola-umkm/update/{id}', [UMKMController::class, 'updateUmkm']);
    // Route::get('/kelola-umkm/delete/{id}', [UMKMController::class, 'deleteUmkm']);


    // Route::get('/kelola-iuran', [AdminController::class, 'kelolaIuran']);
    // Route::get('/laporan-iuran', [AdminController::class, 'laporanIuran']);
    // Route::get('/kelola-bansos', [AdminController::class, 'kelolaBansos']);
    // Route::get('/kelola-surat', [AdminController::class, 'kelolaSurat']);
    // Route::get('/laporan-pengaduan', [AdminController::class, 'laporanPengaduan']);
    // Route::get('/history-pengaduan', [AdminController::class, 'historyPengaduan']);
});
