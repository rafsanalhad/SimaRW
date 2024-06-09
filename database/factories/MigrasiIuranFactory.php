<?php

namespace Database\Factories;

use App\Models\IuranModel;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\MigrasiIuran>
 */
class MigrasiIuranFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'tanggal_migrasi' => now(),
            'dana_keluar' => null,
            'dana_masuk' => 30000 * IuranModel::count(),
            'sisa_saldo' => 30000 * IuranModel::count(),
        ];
    }
}
