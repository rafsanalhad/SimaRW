<?php

namespace Database\Factories;

use DateTime;
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
        static $date = new DateTime('2024-01-01');

        if($number > KartuKeluargaModel::count()) {
            $number = 1;

            if ($date) {
                $date->modify('+1 month');
            }
        }

        return [
            'kartu_keluarga_id' => $number++,
            'tanggal_iuran' => $date->format('Y-m-d'),
            'tanggal_bayar' => fake()->dateTimeBetween('2024-01-01', '2024-03-01')->format('Y-m-d'),
            'status' => 'Lunas'
        ];
    }
}
