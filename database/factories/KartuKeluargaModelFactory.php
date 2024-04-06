<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\KartuKeluargaModel>
 */
class KartuKeluargaModelFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'no_kartu_keluarga' => fake()->nik(),
            'nama_kepala_keluarga' => fake()->name('male'),
            'alamat_kk' => fake()->address(),
            'jumlah_anggota_keluarga' => rand(1, 5)
        ];
    }
}
