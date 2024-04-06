<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\LokasiUmkmModel>
 */
class LokasiUmkmModelFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'umkm_id' => rand(1, count(\App\Models\UmkmModel::select('umkm_id')->get())),
            'latitude_umkm' => $this->faker->latitude(),
            'longitude_umkm' => $this->faker->longitude()
        ];
    }
}
