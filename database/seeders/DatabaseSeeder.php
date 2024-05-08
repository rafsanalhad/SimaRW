<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\DetailPengeluaranModel;
use App\Models\DetailSuratModel;
use App\Models\IuranModel;
use App\Models\KartuKeluargaModel;
use App\Models\KegiatanWargaModel;
use App\Models\LokasiUmkmModel;
use App\Models\PenerimaanBansosModel;
use App\Models\PengaduanWargaModel;
use App\Models\PengajuanBansosModel;
use App\Models\SuratModel;
use App\Models\UmkmModel;
use App\Models\UserModel;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
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
        PengajuanBansosModel::factory(5)->create();

        // Call factory for PenerimaanBansos table
        PenerimaanBansosModel::factory(5)->create();

        // Call factory for Iuran table
        IuranModel::factory(5)->create();

        // Call factory for Detail Pengeluaran table
        DetailPengeluaranModel::factory(5)->create();
    }
}
