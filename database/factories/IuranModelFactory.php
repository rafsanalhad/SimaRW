<?php

namespace Database\Factories;

use App\Models\KartuKeluargaModel;
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
        static $number = 1;

        if($number > KartuKeluargaModel::count()) {
            $number = 1;
        }

        return [
            'kartu_keluarga_id' => $number++,
            'tanggal_iuran' => fake()->date(),
            'tanggal_bayar' => fake()->date(),
            'status' => 'Lunas'
        ];
    }
}
