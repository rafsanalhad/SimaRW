<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class KegiatanWargaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('kegiatan_warga')->insert([
            'nama_kegiatan' => 'Kerja Bakti',
            'tempat_kegiatan' => 'Di Masing-masing RT',
            'deskripsi_kegiatan' => 'Kerja bakti dilakukan untuk membersihkan lingkungan RT sekitar, agar terhindar dari penyakit.',
            'jadwal_kegiatan' => fake()->date(),
            'jam_awal' => fake()->time('H:i'),
            'jam_akhir' => fake()->time('H:i'),
        ]);

        DB::table('kegiatan_warga')->insert([
            'nama_kegiatan' => 'Pernikahan',
            'tempat_kegiatan' => 'Di Gedung Desa',
            'deskripsi_kegiatan' => 'Pernikahan antara Budi dan Ani. Acara harap dihadiri oleh seluruh warga desa.',
            'jadwal_kegiatan' => fake()->date(),
            'jam_awal' => fake()->time('H:i'),
            'jam_akhir' => fake()->time('H:i'),
        ]);

        DB::table('kegiatan_warga')->insert([
            'nama_kegiatan' => 'Vaksinasi Covid-19',
            'tempat_kegiatan' => 'Di Kelurahan',
            'deskripsi_kegiatan' => 'Vaksinasi Covid-19 untuk warga desa. Harap membawa KTP dan Kartu Keluarga. Untuk mendapatkan vaksinasi gratis.',
            'jadwal_kegiatan' => fake()->date(),
            'jam_awal' => fake()->time('H:i'),
            'jam_akhir' => fake()->time('H:i'),
        ]);

        DB::table('kegiatan_warga')->insert([
            'nama_kegiatan' => 'Acara 17-an',
            'tempat_kegiatan' => 'Di Lapangan Desa',
            'deskripsi_kegiatan' => 'Acara 17-an untuk memperingati hari kemerdekaan Indonesia. Acara diisi dengan lomba-lomba dan hiburan lainnya.',
            'jadwal_kegiatan' => '2024-08-17',
            'jam_awal' => fake()->time('H:i'),
            'jam_akhir' => fake()->time('H:i'),
        ]);

        DB::table('kegiatan_warga')->insert([
            'nama_kegiatan' => 'Rapat Warga',
            'tempat_kegiatan' => 'Di Rumah Pak RT 01',
            'deskripsi_kegiatan' => 'Rapat warga untuk membahas masalah-masalah yang ada di RT 01. Harap dihadiri oleh seluruh kepala keluarga RT 01.',
            'jadwal_kegiatan' => fake()->date(),
            'jam_awal' => '19:00',
            'jam_akhir' => '21:00',
        ]);
    }
}
