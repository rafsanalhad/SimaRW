<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('role')->insert([
            'nama_role' => 'admin',
            'deskripsi_role' => 'Administrator'
        ]);

        DB::table('role')->insert([
            'nama_role' => 'rt',
            'deskripsi_role' => 'Ketua RT'
        ]);

        DB::table('role')->insert([
            'nama_role' => 'rw',
            'deskripsi_role' => 'Ketua RW'
        ]);

        DB::table('role')->insert([
            'nama_role' => 'warga',
            'deskripsi_role' => 'Warga'
        ]);
    }
}
