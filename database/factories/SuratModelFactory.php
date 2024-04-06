<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\SuratModel>
 */
class SuratModelFactory extends Factory
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
            'jenis_surat' => ['Surat Keterangan', 'Surat Izin', 'Surat Pernyataan'][rand(0, 2)]
        ];
    }
}
