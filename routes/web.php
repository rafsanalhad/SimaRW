<?php

use App\Http\Controllers\Admin\PengumumanController;
use App\Http\Controllers\RT\RTController;
use App\Http\Controllers\RW\RWController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\WargaController;
use App\Http\Controllers\LogoutController;
use App\Http\Controllers\Admin\UMKMController;
use App\Http\Controllers\Admin\PengaduanController;
use App\Http\Controllers\Admin\KelolaDataController;
use App\Http\Controllers\Admin\KelolaIuranController;

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

Route::get('/login', [HomeController::class, 'login'])->name('login');
Route::post('/login', [LoginController::class, 'authenticate'])->name('authUser');
Route::get('/logout', [LogoutController::class, 'logout']);
Route::get('/forgot-password', [HomeController::class, 'forgotPassword']);
Route::get('/new-password', [HomeController::class, 'newPassword']);
Route::get('/kode-verif', [HomeController::class, 'kodeVerif']);

Route::middleware(['auth'])->group(function () {
    Route::group(['middleware' => ['CekLogin:1']], function() {
        Route::prefix('admin')->group(function () {
            // Route Index dan profil
            Route::get('/dashboard', [AdminController::class, 'index'])->name('dashboardAdmin');
            Route::get('/profil-admin', [AdminController::class, 'profilAdmin']);

            // Route get pengumuman
            Route::get('/pengumuman', [PengumumanController::class, 'show']);

            // Route Kelola Data Warga
            Route::get('/kelola-warga', [KelolaDataController::class, 'kelolaWarga']);
            Route::post('/kelola-warga', [KelolaDataController::class, 'createWarga'])->name('createWarga');
            Route::get('/kelola-warga/edit/{id}', [KelolaDataController::class, 'editWarga']);
            Route::get('/kelola-warga/delete/{id}', [KelolaDataController::class, 'deleteWarga']);
            Route::post('/kelola-warga/update/{id}', [KelolaDataController::class, 'updateWarga'])->name('updateWarga');

            // Route Kelola Data RT
            Route::get('/kelola-rt', [KelolaDataController::class, 'kelolaRt']);
            Route::post('kelola-rt', [KelolaDataController::class, 'createRt']);
            Route::get('/kelola-rt/edit/{id}', [KelolaDataController::class, 'editRt']);
            Route::post('/kelola-rt/update', [KelolaDataController::class, 'updateRt']);
            Route::get('/kelola-rt/delete/{id}', [KelolaDataController::class, 'deleteRt']);

            // Route Kelola Data RW
            Route::get('/kelola-rw', [KelolaDataController::class, 'kelolaRw']);
            Route::post('/kelola-rw', [KelolaDataController::class, 'createRw'])->name('createRw');
            Route::get('/kelola-rw/edit/{id}', [KelolaDataController::class, 'editRw']);
            Route::post('/kelola-rw/update', [KelolaDataController::class, 'updateRw'])->name('updateRw');
            Route::get('/kelola-rw/delete/{id}', [KelolaDataController::class, 'deleteRw']);

            // Route Kelola Data UMKM
            Route::get('/kelola-umkm', [UMKMController::class, 'kelolaUmkm']);
            Route::post('/kelola-umkm', [UMKMController::class, 'createUmkm'])->name('createUmkm');
            Route::get('/kelola-umkm/edit/{id}', [UMKMController::class, 'editUmkm']);
            Route::post('/kelola-umkm/update/{id}', [UMKMController::class, 'updateUmkm']);
            Route::get('/kelola-umkm/delete/{id}', [UMKMController::class, 'deleteUmkm']);

            // Route Kelola Data Iuran
            Route::get('/laporan-iuran', [KelolaIuranController::class, 'laporanIuran']);

            // Next features...
            Route::get('/kelola-iuran', [AdminController::class, 'kelolaIuran']);
            Route::get('/kelola-bansos', [AdminController::class, 'kelolaBansos']);
            Route::get('/kelola-surat', [AdminController::class, 'kelolaSurat']);

            // Route Pengaduan
            Route::get('/laporan-pengaduan', [PengaduanController::class, 'laporanPengaduan']);
            Route::get('/tolak-pengaduan/{id}', [PengaduanController::class, 'updateTolakPengaduan'])->name('tolakPengaduan');
            Route::get('/terima-pengaduan/{id}', [PengaduanController::class, 'updateTerimaPengaduan'])->name('terimaPengaduan');
            Route::get('/history-pengaduan', [PengaduanController::class, 'historyPengaduan']);
        });
    });
    Route::group(['middleware' => ['CekLogin:2']], function() {
        Route::prefix('rt')->group(function () {
            Route::get('/dashboard', [RTController::class, 'index']);

            Route::get('/kelola-warga', [RTController::class, 'kelolaWarga']);
            Route::post('/kelola-warga', [RTController::class, 'createWarga'])->name('createWarga');
            Route::get('/kelola-warga/edit/{id}', [RTController::class, 'editWarga']);
            Route::get('/kelola-warga/delete/{id}', [RTController::class, 'deleteWarga']);
            Route::post('/kelola-warga/update/{id}', [RTController::class, 'updateWarga'])->name('updateWarga');
        });
    });
    Route::group(['middleware' => ['CekLogin:3']], function() {
        Route::prefix('rw')->group(function () {
            Route::get('/dashboard', [RWController::class, 'index']);

            Route::get('/kelola-warga', [RWController::class, 'kelolaWarga']);
            Route::post('/kelola-warga', [RWController::class, 'createWarga'])->name('createWarga');
            Route::get('/kelola-warga/edit/{id}', [RWController::class, 'editWarga']);
            Route::get('/kelola-warga/delete/{id}', [RWController::class, 'deleteWarga']);
            Route::post('/kelola-warga/update/{id}', [RWController::class, 'updateWarga'])->name('updateWarga');
        });
    });
    Route::group(['middleware' => ['CekLogin:4']], function() {
        Route::prefix('warga')->group(function () {
            Route::get('/dashboard', [WargaController::class, 'index'])->name('dashboardWarga');
            Route::get('/bayar-iuran', [WargaController::class, 'bayarIuran']);
            Route::get('/kegiatan-warga', [WargaController::class, 'kegiatanWarga']);
            Route::get('/umkm', [WargaController::class, 'umkm']);
            Route::get('/profil-warga', [WargaController::class, 'profilWarga']);
            Route::get('/pengajuan-bansos', [WargaController::class, 'pengajuanBansos']);
            Route::get('/pengaduan', [WargaController::class, 'pengaduanWarga']);
            Route::get('/laporan-iuran', [WargaController::class, 'laporanIuran']);
            Route::get('/penerima-bansos', [WargaController::class, 'penerimaBansos']);
            Route::get('/pengajuan-surat', [WargaController::class, 'pengajuanSurat']);
        });
    });
});

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
