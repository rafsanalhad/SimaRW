<?php

namespace Database\Seeders;

use App\Models\UserModel;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class PengaduanWargaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('pengaduan_warga')->insert([
            'user_id' => rand(1, UserModel::count()),
            'tanggal_pengaduan' => fake()->date(),
            'isi_pengaduan' => 'Terjadi kerusakan jalan di gerbang desa',
            'status_pengaduan' => fake()->randomElement(['Ditolak', 'Diproses', 'Selesai']),
            'nomor_rt' => 1,
            'nomor_rw' => 5,
        ]);

        DB::table('pengaduan_warga')->insert([
            'user_id' => rand(1, UserModel::count()),
            'tanggal_pengaduan' => fake()->date(),
            'isi_pengaduan' => 'Ada warga yang berisik di malam hari. Mohon untuk ditindaklanjuti, Lokasinya berada di samping rumah saya',
            'status_pengaduan' => fake()->randomElement(['Ditolak', 'Diproses', 'Selesai']),
            'nomor_rt' => 1,
            'nomor_rw' => 5,
        ]);

        DB::table('pengaduan_warga')->insert([
            'user_id' => rand(1, UserModel::count()),
            'tanggal_pengaduan' => fake()->date(),
            'isi_pengaduan' => 'Ada warga yang membuang sampah sembarangan di depan rumah saya. Mohon untuk ditindaklanjuti',
            'status_pengaduan' => fake()->randomElement(['Ditolak', 'Diproses', 'Selesai']),
            'nomor_rt' => 1,
            'nomor_rw' => 5,
        ]);

        DB::table('pengaduan_warga')->insert([
            'user_id' => rand(1, UserModel::count()),
            'tanggal_pengaduan' => fake()->date(),
            'isi_pengaduan' => 'Ada warga yang menggunakan knalpot bising di malam hari. Mohon untuk ditindaklanjuti',
            'status_pengaduan' => fake()->randomElement(['Ditolak', 'Diproses', 'Selesai']),
            'nomor_rt' => 1,
            'nomor_rw' => 5,
        ]);

        DB::table('pengaduan_warga')->insert([
            'user_id' => rand(1, UserModel::count()),
            'tanggal_pengaduan' => fake()->date(),
            'isi_pengaduan' => 'Ada warga yang membuang sampah di sungai. Mohon untuk ditindaklanjuti',
            'status_pengaduan' => fake()->randomElement(['Ditolak', 'Diproses', 'Selesai']),
            'nomor_rt' => 1,
            'nomor_rw' => 5,
        ]);
    }
}
