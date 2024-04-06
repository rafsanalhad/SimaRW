<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\DetailSuratModel>
 */
class DetailSuratModelFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'surat_id' => rand(1, count(\App\Models\SuratModel::select('surat_id')->get())),
            'tanggal_surat' => fake()->date(),
            'tanda_tangan_rt' => 'tandaTanganRT.jpg',
            'tanda_tangan_rw' => 'tandaTanganRW.jpg'
        ];
    }
}
