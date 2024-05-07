<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\PengaduanWargaModel>
 */
class PengaduanWargaModelFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'user_id' => rand(1, count(\App\Models\UserModel::select('user_id')->get())),
            'tanggal_pengaduan' => fake()->date(),
            'isi_pengaduan' => fake()->sentence(),
            'status_pengaduan' => ['Ditolak', 'Diproses', 'Selesai'][rand(0, 2)]
        ];
    }
}
