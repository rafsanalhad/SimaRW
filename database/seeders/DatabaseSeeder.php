<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
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
        KartuKeluargaModel::factory(5)->create();
        $this->call(RoleSeeder::class);
        UserModel::factory(10)->create();
        PengaduanWargaModel::factory(10)->create();
        SuratModel::factory(10)->create();
        DetailSuratModel::factory(10)->create();
        KegiatanWargaModel::factory(10)->create();
        UmkmModel::factory(10)->create();
        LokasiUmkmModel::factory(10)->create();
        PengajuanBansosModel::factory(5)->create();
        PenerimaanBansosModel::factory(5)->create();
        IuranModel::factory(5)->create();
    }
}
