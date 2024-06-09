<?php

namespace Database\Seeders;

use App\Models\UserModel;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class UMKMSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('umkm')->insert([
            'nama_umkm' => 'Toko Kelontong Pak Salim',
            'alamat_umkm' => fake()->address(),
            'deskripsi_umkm' => 'Toko kelontong pak salim menyediakan berbagai macam kebutuhan pokok, seperti beras, minyak, dan lain-lain. Selain itu harganya juga murah meriah',
            'kontak_umkm' => fake()->phoneNumber(),
            'jam_operasional_awal' => fake()->time('H:i'),
            'jam_operasional_akhir' => fake()->time('H:i'),
            'gambar_umkm' => 'UMKM-Images/defaul.jpg',
            'user_id' => rand(1, UserModel::count())
        ]);

        DB::table('umkm')->insert([
            'nama_umkm' => 'Toko Ikan Pak Rafsan',
            'alamat_umkm' => fake()->address(),
            'deskripsi_umkm' => 'Toko ikan pak rafsan menyediakan berbagai macam ikan segar, seperti ikan lele, ikan gurame, dan ikan hias. Melayani pembelian secara grosir dan eceran',
            'kontak_umkm' => fake()->phoneNumber(),
            'jam_operasional_awal' => fake()->time('H:i'),
            'jam_operasional_akhir' => fake()->time('H:i'),
            'gambar_umkm' => 'UMKM-Images/defaul.jpg',
            'user_id' => rand(1, UserModel::count())
        ]);

        DB::table('umkm')->insert([
            'nama_umkm' => 'Warung Makan Bu Anisa',
            'alamat_umkm' => fake()->address(),
            'deskripsi_umkm' => 'Warung makan bu anisa menyediakan berbagai macam makanan khas indonesia, seperti nasi goreng, mie goreng, dan lain-lain. Selain itu harganya juga murah meriah',
            'kontak_umkm' => fake()->phoneNumber(),
            'jam_operasional_awal' => fake()->time('H:i'),
            'jam_operasional_akhir' => fake()->time('H:i'),
            'gambar_umkm' => 'UMKM-Images/defaul.jpg',
            'user_id' => rand(1, UserModel::count())
        ]);

        DB::table('umkm')->insert([
            'nama_umkm' => 'Toko Kelontong Mundur Jaya',
            'alamat_umkm' => fake()->address(),
            'deskripsi_umkm' => 'Toko kelontong mundur jaya memberikan harga termurah untuk kebutuhan pokok. Jika ada toko yang lebih mahal daripada Toko Kelontong Mundur Jaya bisa menghubungi kami melalui kontak yang tersedia.',
            'kontak_umkm' => fake()->phoneNumber(),
            'jam_operasional_awal' => fake()->time('H:i'),
            'jam_operasional_akhir' => fake()->time('H:i'),
            'gambar_umkm' => 'UMKM-Images/defaul.jpg',
            'user_id' => rand(1, UserModel::count())
        ]);

        DB::table('umkm')->insert([
            'nama_umkm' => 'Warkop Mas Anis',
            'alamat_umkm' => fake()->address(),
            'deskripsi_umkm' => 'Warkop Mas Anis menyediakan berbagai minuman dari pop ice, kopi, hingga minuman kekinian. Warkop Mas Anis bertujuan untuk menghilangkan dehidrasi ketika cuaca panas. Selain itu, Warkop Mas Anis memiliki harga yang lebih terjangkau daripada Starbucks atau Starling',
            'kontak_umkm' => fake()->phoneNumber(),
            'jam_operasional_awal' => fake()->time('H:i'),
            'jam_operasional_akhir' => fake()->time('H:i'),
            'gambar_umkm' => 'UMKM-Images/defaul.jpg',
            'user_id' => rand(1, UserModel::count())
        ]);
    }
}
