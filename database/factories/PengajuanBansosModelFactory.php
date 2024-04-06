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
            'tanggal_pengajuan' => fake()->date(),
            'bukti_pengajuan' => 'buktiPengajuan.jpg',
            'status_verif' => ['Belum Terverifikasi', 'Terverifikasi'][rand(0, 1)]
        ];
    }
}
