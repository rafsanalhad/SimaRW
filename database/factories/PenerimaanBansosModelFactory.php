<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\PenerimaanBansosModel>
 */
class PenerimaanBansosModelFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'pengajuan_id' => rand(1, count(\App\Models\PengajuanBansosModel::select('pengajuan_id')->get())),
            'tanggal_penerimaan' => fake()->date(),
            'bukti_penerimaan' => 'buktiPenerimaan.jpg'
        ];
    }
}
