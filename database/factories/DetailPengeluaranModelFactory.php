<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class DetailPengeluaranModelFactory extends Factory
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
            'jumlah_pengeluaran' => rand(100000, 500000),
            'bukti_pengeluaran' => 'buktiPengeluaran.jpg',
            'detail_pengeluaran' => fake()->sentence()
        ];
    }
}
