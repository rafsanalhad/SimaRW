<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\IuranModel>
 */
class IuranModelFactory extends Factory
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
            'tanggal_iuran' => fake()->date(),
            'bukti_iuran' => 'buktiIuran.jpg',
            'status' => fake()->randomElement(['Lunas', 'Belum Lunas'])
        ];
    }
}
