<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\PengajuanBansosModel>
 */
class PengajuanBansosModelFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'kartu_keluarga_id' => rand(1, count(\App\Models\KartuKeluargaModel::select('kartu_keluarga_id')->get())),
            'pendapatan_keluarga' => rand(1000000, 10000000),
            'tanggungan_warga' => rand(1, 10),
            'nomor_rt' => rand(1, 10),
            
            'tanggal_pengajuan' => fake()->date(),
            'bukti_pengajuan' => 'buktiPengajuan.jpg',
            'status_verif' => ['Belum Terverifikasi', 'Terverifikasi'][rand(0, 1)]
        ];
    }
}
