<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\KegiatanWargaModel>
 */
class KegiatanWargaModelFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'nama_kegiatan' => $this->faker->word(),
            'deskripsi_kegiatan' => $this->faker->sentence(),
            'jadwal_kegiatan' => $this->faker->date(),
            'jam_awal' => $this->faker->time(),
            'jam_akhir' => $this->faker->time(),
        ];
    }
}
