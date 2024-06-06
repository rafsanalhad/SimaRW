<?php

use Illuminate\Support\Facades\Route;
use App\Services\UpdateSPKVikorService;
use App\Http\Controllers\HomeController;
use App\Services\UpdateSPKBansosService;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RT\RTController;
use App\Http\Controllers\RW\RWController;
use App\Http\Controllers\WargaController;
use App\Http\Controllers\LogoutController;
use App\Http\Controllers\RT\RTUMKMController;
use App\Http\Controllers\Warga\TemplateSurat;
use App\Http\Controllers\Admin\UMKMController;
use App\Http\Controllers\RT\RTBansosController;
use App\Http\Controllers\Warga\IuranController;
use App\Http\Controllers\RT\KelolaNKKController;
use App\Http\Controllers\RT\ProfileRTController;
use App\Http\Controllers\RW\ProfileRWController;
use App\Http\Controllers\Admin\AdminUbahPassword;
use App\Http\Controllers\ForgotPasswordController;
use App\Http\Controllers\RT\KelolaWargaController;
use App\Http\Controllers\RT\RTPengaduanController;
use App\Http\Controllers\Admin\PengaduanController;
use App\Http\Controllers\Warga\DashboardController;
use App\Http\Controllers\Admin\AdminIuranController;
use App\Http\Controllers\Admin\KelolaDataController;
use App\Http\Controllers\Admin\PengumumanController;
use App\Http\Controllers\RT\RTKelolaIuranController;
use App\Http\Controllers\RT\RTKelolaSuratController;
use App\Http\Controllers\Admin\KelolaIuranController;
use App\Http\Controllers\Admin\KelolaSuratController;
use App\Http\Controllers\Admin\ProfilAdminController;
use App\Http\Controllers\RT\RTUbahPasswordController;
use App\Http\Controllers\Warga\ProfilWargaController;
use App\Http\Controllers\RT\RTKelolaKegiatanController;
use App\Http\Controllers\Warga\KegiatanWargaController;
use App\Http\Controllers\Warga\PengajuanSuratController;
use App\Http\Controllers\Admin\AdminUbahPasswordController;
use App\Http\Controllers\Warga\WargaUbahPasswordController;
use App\Http\Controllers\Admin\BansosController as AdminBansos;
use App\Http\Controllers\Warga\BansosController as WargaBansos;
use App\Http\Controllers\Warga\UMKMController as WargaUMKMController;
use App\Http\Controllers\RT\DashboardController as RTDashboardController;
use App\Http\Controllers\Admin\DashboardController as AdminDashboardController;
use App\Http\Controllers\Warga\PengaduanController as WargaPengaduanController;
use \App\Http\Controllers\Admin\KegiatanWargaController as AdminKegiatanWargaController;

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

// Route::get('/test', [UpdateSPKBansosService::class, 'updateBansos']);

Route::get('/', [HomeController::class, 'index']);

//Route Mengirim Hubungi Kami
Route::post('/hubungi-kami', [HomeController::class, 'pengaduan']);

// Route Login dan Autentikasi
Route::get('/login', [HomeController::class, 'login'])->name('login');
Route::post('/login', [LoginController::class, 'authenticate'])->name('authUser');

// Route User Logout
Route::get('/logout', [LogoutController::class, 'logout']);

// Route Forgot Password
Route::get('/forgot-password', [ForgotPasswordController::class, 'index']);
Route::post('/forgot-password', [ForgotPasswordController::class, 'sendEmail']);

// Route Get Kode Verifikasi Reset Password
Route::get('/kode-verif', [ForgotPasswordController::class, 'pageKodeVerif'])->name('pageCekKode');
Route::post('/kode-verif', [ForgotPasswordController::class, 'cekKodeVerif']);

// Route New Password
Route::get('/new-password', [ForgotPasswordController::class, 'pageNewPass']);
Route::post('/new-password', [ForgotPasswordController::class, 'newPassword']);

// Route get data chart dashboard (sementara)
Route::get('/dashboard/getBarChart/{tahun}', [DashboardController::class, 'getBarChart'])->name('getBarChart');
Route::get('/dashboard/getPieChart/{tahun}', [DashboardController::class, 'getPieChart'])->name('getPieChart');

// Route Check Role
Route::middleware(['auth'])->group(function () {

    // Route Role Admin
    Route::group(['middleware' => ['CekLogin:1']], function() {
        Route::prefix('admin')->group(function () {
            // Route Index admin
            Route::get('/dashboard', [AdminDashboardController::class, 'index'])->name('dashboardAdmin');

            // Route profil admin
            Route::get('/profil-admin', [ProfilAdminController::class, 'profilAdmin']);

            // Route Ubah Password
            Route::get('/ubah-password', [AdminUbahPasswordController::class, 'ubahPassword']);
            Route::post('/ubah-password', [AdminUbahPasswordController::class, 'updatePassword']);

            // Route get pengumuman
            Route::get('/pengumuman', [PengumumanController::class, 'show']);
            Route::post('/tambah-pengumuman', [PengumumanController::class, 'create']);

            // Route Kelola NKK
            Route::get('/kelola-nkk', [KelolaDataController::class, 'showKK']);
            Route::post('/kelola-nkk', [KelolaDataController::class, 'createNKK'])->name('createNKK');
            Route::get('/kelola-nkk/edit/{id}', [KelolaDataController::class, 'editNKK']);
            Route::post('/kelola-nkk/update/{id}', [KelolaDataController::class, 'updateNKK'])->name('updateNKK');
            Route::get('/kelola-nkk/delete/{id}', [KelolaDataController::class, 'deleteNKK']);
            Route::get('/download-nkk', [KelolaDataController::class, 'downloadExcelNKK']);

            // Route Kelola Data Warga
            Route::get('/kelola-warga', [KelolaDataController::class, 'kelolaWarga']);
            Route::post('/kelola-warga', [KelolaDataController::class, 'createWarga'])->name('createWarga');
            Route::get('/kelola-warga/edit/{id}', [KelolaDataController::class, 'editWarga']);
            Route::get('/kelola-warga/delete/{id}', [KelolaDataController::class, 'deleteWarga']);
            Route::post('/kelola-warga/update/{id}', [KelolaDataController::class, 'updateWarga'])->name('updateWarga');
            Route::get('/download-warga', [KelolaDataController::class, 'downloadExcelWarga']);

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
            Route::get('/kelola-umkm/detail/{id}', [UMKMController::class, 'detailUmkm']);

            // Route Kelola Data Iuran
            Route::get('/kelola-iuran', [AdminIuranController::class, 'kelolaIuran']);
            Route::post('/kelola-iuran', [AdminIuranController::class, 'createPengeluaranIuran']);
            Route::get('/laporan-iuran', [KelolaIuranController::class, 'laporanIuran']);
            Route::get('/download-iuran', [KelolaIuranController::class, 'downloadExcel']);

            // Route Kelola Data Surat
            Route::get('/kelola-surat', [KelolaSuratController::class, 'kelolaSurat']);


            // Route Kelola Bansos
            Route::get('/kelola-bansos', [AdminBansos::class, 'kelolaBansos']);
            Route::get('/get-file/{idPengajuan}', [AdminBansos::class, 'getPDFPengajuan']);
            Route::get('/terima-bansos/{id}', [AdminBansos::class, 'terimaPengajuan']);
            Route::post('/tolak-bansos/{id}', [AdminBansos::class, 'tolakPengajuan']);

            // Route History Bansos
            Route::get('/penerima-bansos', [AdminBansos::class, 'historyBansos']);

            // Route Rekomendasi SPK Bansos
            Route::get('/rekomendasi-bansos', [AdminBansos::class, 'rekomendasiBansos']);

            // Route Pengaduan User
            Route::get('/laporan-pengaduan', [PengaduanController::class, 'laporanPengaduan']);
            Route::post('/tolak-pengaduan/{id}', [PengaduanController::class, 'updateTolakPengaduan'])->name('tolakPengaduan');
            Route::get('/terima-pengaduan/{id}', [PengaduanController::class, 'updateTerimaPengaduan'])->name('terimaPengaduan');
            Route::get('/history-pengaduan', [PengaduanController::class, 'historyPengaduan']);

            // kelola kegiatan warga
            Route::get('/kegiatan-warga', [AdminKegiatanWargaController::class, 'kelolaKegiatan']);
            Route::post('/kegiatan-warga', [AdminKegiatanWargaController::class, 'createKegiatan'])->name('createKegiatan');
            Route::get('/kegiatan-warga/edit/{id}', [AdminKegiatanWargaController::class, 'editKegiatan']);
            Route::post('/kegiatan-warga/update/{id}', [AdminKegiatanWargaController::class, 'updateKegiatan']);
            Route::get('/kegiatan-warga/delete/{id}', [AdminKegiatanWargaController::class, 'deleteKegiatan']);

        });
    });
    Route::group(['middleware' => ['CekLogin:2']], function() {
        Route::prefix('rt')->group(function () {
            // Route Dashboard admin
            Route::get('/dashboard', [RTDashboardController::class, 'index']);

            // Route Profile RT
            Route::get('/profil-rt', [ProfileRTController::class, 'profileRt']);

            // Route Ubah Password
            Route::get('/ubah-password', [RTUbahPasswordController::class, 'ubahPassword']);
            Route::post('/ubah-password', [RTUbahPasswordController::class, 'updatePassword']);


            // Route::get('/profil-admin', [ProfilAdminController::class, 'profilAdmin']);

            // // Route get pengumuman
            // Route::get('/pengumuman', [PengumumanController::class, 'show']);
            // Route::post('/tambah-pengumuman', [PengumumanController::class, 'create']);

            // kelola data Warga
            Route::get('/kelola-warga', [KelolaWargaController::class, 'kelolaWarga']);
            Route::post('/kelola-warga', [KelolaWargaController::class, 'createWarga'])->name('createWarga');
            Route::get('/kelola-warga/edit/{id}', [KelolaWargaController::class, 'editWarga']);
            Route::get('/kelola-warga/delete/{id}', [KelolaWargaController::class, 'deleteWarga']);
            Route::post('/kelola-warga/update/{id}', [KelolaWargaController::class, 'updateWarga'])->name('updateWarga');
            Route::get('/download-warga', [KelolaWargaController::class, 'downloadExcelWarga']);

            // Route Kelola NKK
            Route::get('/kelola-nkk', [KelolaNKKController::class, 'showKK']);
            Route::post('/kelola-nkk', [KelolaNKKController::class, 'createNKK'])->name('createNKK');
            Route::get('/kelola-nkk/edit/{id}', [KelolaNKKController::class, 'editNKK']);
            Route::post('/kelola-nkk/update/{id}', [KelolaNKKController::class, 'updateNKK'])->name('updateNKK');
            Route::get('/kelola-nkk/delete/{id}', [KelolaNKKController::class, 'deleteNKK']);
            Route::get('/download-nkk', [KelolaNKKController::class, 'downloadExcelNKK']);

            // kelola UMKM
            Route::get('/kelola-umkm', [RTUMKMController::class, 'kelolaUmkm']);
            Route::post('/kelola-umkm', [RTUMKMController::class, 'createUmkm'])->name('createUmkm');
            Route::get('/kelola-umkm/edit/{id}', [RTUMKMController::class, 'editUmkm']);
            Route::post('/kelola-umkm/update/{id}', [RTUMKMController::class, 'updateUmkm']);
            Route::get('/kelola-umkm/delete/{id}', [RTUMKMController::class, 'deleteUmkm']);

            // iuran
            Route::get('/kelola-iuran', [RTKelolaIuranController::class, 'kelolaIuran']);
            Route::post('kelola-iuran', [RTKelolaIuranController::class, 'createIuran']);
            Route::get('/laporan-iuran', [RTKelolaIuranController::class, 'laporanIuran']);
            Route::get('/download-iuran', [RTKelolaIuranController::class, 'downloadExcel']);

            // Bansos
            Route::get('/kelola-bansos', [RTBansosController::class, 'kelolaBansos']);
            Route::get('/penerima-bansos', [RTBansosController::class, 'historyBansos']);
            Route::get('/rekomendasi-bansos', [RTBansosController::class, 'rekomendasiBansos']);
            Route::get('/get-file/{idPengajuan}', [AdminBansos::class, 'getPDFPengajuan']);
            Route::get('/pengajuan/terima/{id}', [AdminBansos::class, 'terimaPengajuan']);
            Route::get('/pengajuan/tolak/{id}', [AdminBansos::class, 'tolakPengajuan']);

            // Laporan Pengaduan
            Route::get('/laporan-pengaduan', [RTPengaduanController::class, 'laporanPengaduan']);
            Route::post('/tolak-pengaduan/{id}', [RTPengaduanController::class, 'updateTolakPengaduan'])->name('RTtolakPengaduan');
            Route::get('/terima-pengaduan/{id}', [RTPengaduanController::class, 'updateTerimaPengaduan'])->name('RT terimaPengaduan');
            Route::get('/history-pengaduan', [RTPengaduanController::class, 'historyPengaduan']);

            // Kelola Surat
            // Route Kelola Data Surat
            Route::get('/kelola-surat', [RTKelolaSuratController::class, 'kelolaSurat']);

            // Pengumuman
            Route::get('/pengumuman', [PengumumanController::class, 'show']);
            Route::post('/tambah-pengumuman', [PengumumanController::class, 'create']);

            // kelola kegiatan warga
            Route::get('/kegiatan-warga', [RTKelolaKegiatanController::class, 'kelolaKegiatan']);
            Route::post('/kegiatan-warga', [RTKelolaKegiatanController::class, 'createKegiatan'])->name('createKegiatan');
            Route::get('/kegiatan-warga/edit/{id}', [RTKelolaKegiatanController::class, 'editKegiatan']);
            Route::get('/kegiatan-warga/update/{id}', [RTKelolaKegiatanController::class, 'updateKegiatan']);
            Route::get('/kegiatan-warga/delete/{id}', [RTKelolaKegiatanController::class, 'deleteKegiatan']);
        });
    });
    // Route::group(['middleware' => ['CekLogin:3']], function() {
    //     Route::prefix('rw')->group(function () {
    //         Route::get('/dashboard', [RWController::class, 'index']);

    //         // Route Profile RW
    //         Route::get('/profil-rw', [ProfileRWController::class, 'profileRw']);

    //         Route::get('/kelola-warga', [RWController::class, 'kelolaWarga']);
    //         Route::post('/kelola-warga', [RWController::class, 'createWarga'])->name('createWarga');
    //         Route::get('/kelola-warga/edit/{id}', [RWController::class, 'editWarga']);
    //         Route::get('/kelola-warga/delete/{id}', [RWController::class, 'deleteWarga']);
    //         Route::post('/kelola-warga/update/{id}', [RWController::class, 'updateWarga'])->name('updateWarga');
    //     });
    // });
    Route::group(['middleware' => ['CekLogin:4']], function() {
        Route::prefix('warga')->group(function () {
            Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboardWarga');

            // Route Bayar Iuran
            Route::get('/bayar-iuran', [IuranController::class, 'index']);
            Route::get('/bayar-iuran/{id}', [IuranController::class, 'bayarIuran'])->name('bayarIuran');

            // Route Kegiatan Warga
            Route::get('/kegiatan-warga', [KegiatanWargaController::class, 'index']);

            // Route UMKM
            Route::get('/umkm', [WargaUMKMController::class, 'index']);

            // Route Profil Warga
            Route::get('/profil-warga', [ProfilWargaController::class, 'profilWarga']);

            // Route Ubah Password Warga
            Route::get('/ubah-password', [WargaUbahPasswordController::class, 'ubahPassword']);
            Route::post('/ubah-password', [WargaUbahPasswordController::class, 'updatePassword']);

            // Route Bansos
            Route::get('/pengajuan-bansos', [WargaBansos::class, 'pengajuanBansos']);
            Route::post('/pengajuan-bansos', [WargaBansos::class, 'createPengajuanBansos']);
            Route::get('/penerima-bansos', [WargaBansos::class, 'historyBansos']);
            Route::get('/rekomendasi-bansos', [WargaBansos::class, 'rekomendasiBansos']);

            // Route Pengaduan Warga
            Route::get('/pengaduan', [WargaPengaduanController::class, 'index']);
            Route::post('/tambah-pengaduan', [WargaPengaduanController::class, 'createPengaduan']);

            // Route Pengajuan Surat
            Route::get('/pengajuan-surat', [PengajuanSuratController::class, 'index']);
            Route::post('/tambah-surat', [PengajuanSuratController::class, 'createSurat']);
            Route::get('/template-surat', [TemplateSurat::class, 'index']);

            Route::get('/download-surat-kk', [TemplateSurat::class, 'downloadSuratKk'])->name('downloadSuratKk');

            // Route Laporan Iuran
            Route::get('/laporan-iuran', [WargaController::class, 'laporanIuran']);
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
