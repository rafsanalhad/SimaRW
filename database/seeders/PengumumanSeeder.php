<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class PengumumanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('pengumuman')->insert([
            'judul_pengumuman' => 'Pernikahan Rafsan & Febi',
            'isi_pengumuman' => 'Kami mengundang anda untuk hadir dalam acara pernikahan kami yang akan dilaksanakan pada tanggal 20 Agustus 2024. Acara akan dimulai pukul 08.00 WIB di Jalan Raya Ciputat No. 20, Tangerang Selatan. Terimakasih.',
            'tanggal_pengumuman' => '2024-08-20',
            'jam_pengumuman' => fake()->time('H:i'),
            'tempat_pengumuman' => 'Gedung Serbaguna Ciputat, Jalan Raya Ciputat No. 20, Kota Malang.'
        ]);

        DB::table('pengumuman')->insert([
            'judul_pengumuman' => 'Kerja Bakti RT 01',
            'isi_pengumuman' => 'Untuk warga RT 01, kami mengundang anda untuk hadir dalam acara kerja bakti yang akan dilaksanakan pada tanggal 9 Juni 2024. Acara akan dimulai pukul 08.00 WIB. Terimakasih.',
            'tanggal_pengumuman' => '2024-06-09',
            'jam_pengumuman' => '08:00',
            'tempat_pengumuman' => 'RT 01, RW 05, Wonokoyo, Malang.'
        ]);

        DB::table('pengumuman')->insert([
            'judul_pengumuman' => 'Acara Shalawatan',
            'isi_pengumuman' => 'Kami mengundang anda untuk hadir dalam acara shalawatan yang akan dilaksanakan pada tanggal 20 Agustus 2024. Acara akan dimulai pukul 20.00 WIB Hingga Selesai. Terimakasih.',
            'tanggal_pengumuman' => '2024-08-20',
            'jam_pengumuman' => '20:00',
            'tempat_pengumuman' => 'Masjid Al-Ikhlas, Jalan Raya Ciputat No. 20, Kota Malang.'
        ]);

        DB::table('pengumuman')->insert([
            'judul_pengumuman' => 'Sunatan Massal',
            'isi_pengumuman' => 'Sunatan Massal akan dilaksanakan pada tanggal 16 Agustus 2024. Acara akan dimulai pukul 08.00 WIB hingga pukul 15:00 WIB. Terimakasih.',
            'tanggal_pengumuman' => '2024-08-16',
            'jam_pengumuman' => '08:00',
            'tempat_pengumuman' => 'Lapangan RT 01, RW 05, Wonokoyo, Malang.'
        ]);

        DB::table('pengumuman')->insert([
            'judul_pengumuman' => 'Acara Lomba Kemerdekaan RI',
            'isi_pengumuman' => 'Kami mengundang anda untuk hadir dalam acara lomba kemerdekaan RI yang akan dilaksanakan pada tanggal 17 Agustus 2024. Acara akan dimulai pukul 06.00 WIB Hingga Selesai. Terimakasih.',
            'tanggal_pengumuman' => '2024-08-17',
            'jam_pengumuman' => '08:00',
            'tempat_pengumuman' => 'Lapangan Sepak Bola, RW 05, Wonokoyo, Malang.'
        ]);
    }
}
