<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\PengumumanModel>
 */
class PengumumanModelFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'judul_pengumuman' => fake()->word(),
            'isi_pengumuman' => fake()->paragraph(),
            'tanggal_pengumuman' => fake()->date(),
            'jam_pengumuman' => fake()->time(),
            'tempat_pengumuman' => fake()->streetName()
        ];
    }
}
