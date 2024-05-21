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
    private $counter = 1;
    public function definition(): array
    {

        return [
            'surat_id' => $this->counter++,
            'tanggal_surat' => fake()->date(),
            'keterangan_surat' => fake()->sentence(),
            'tanda_tangan_rt' => 'tandaTanganRT.jpg',
            'tanda_tangan_rw' => 'tandaTanganRW.jpg'
        ];
    }
}
