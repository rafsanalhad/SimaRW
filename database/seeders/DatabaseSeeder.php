<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\UmkmModel;
use App\Models\UserModel;
use App\Models\IuranModel;
use App\Models\SuratModel;
use App\Models\LokasiUmkmModel;
use App\Models\PengumumanModel;
use Illuminate\Database\Seeder;
use App\Models\DetailSuratModel;
use Database\Seeders\RoleSeeder;
use App\Models\KartuKeluargaModel;
use App\Models\KegiatanWargaModel;
use Illuminate\Support\Facades\DB;
use App\Models\PengaduanWargaModel;
use App\Models\PengajuanBansosModel;
use App\Models\PenerimaanBansosModel;
use App\Models\DetailPengeluaranModel;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    use WithoutModelEvents;

    public function run(): void
    {
        // Call factory for KartuKeluarga table
        KartuKeluargaModel::factory(5)->create();

        // Call RoleSeeder to put in db
        $this->call(RoleSeeder::class);

        // Call UserFactory for user table
        UserModel::factory(10)->create();

        // Call factory for PengaduanWarga table
        PengaduanWargaModel::factory(10)->create();

        // Call factory for Surat table
        SuratModel::factory(10)->create();

        // Call factory for DetailSurat table
        DetailSuratModel::factory(10)->create();

        // Call factory for KegiatanWarga table
        KegiatanWargaModel::factory(10)->create();

        // Call factory for Umkm table
        UmkmModel::factory(10)->create();

        // Call factory for LokasiUmkm table
        LokasiUmkmModel::factory(10)->create();

        // Call factory for PengajuanBansos table
        // PengajuanBansosModel::factory(5)->create();

        // Call factory for PenerimaanBansos table
        // PenerimaanBansosModel::factory(5)->create();

        // Call factory for Pengumuman
        PengumumanModel::factory(3)->create();

        // Call factory for Detail Pengeluaran table
        DetailPengeluaranModel::factory(5)->create();

        // Create Seed Migrasi Iuran Table
        DB::table('migrasi_iuran')->insert([
            'tanggal_migrasi' => now(),
            'dana_keluar' => null,
            'dana_masuk' => 0,
            'sisa_saldo' => 0,
        ]);
    }
}
