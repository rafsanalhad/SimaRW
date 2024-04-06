<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\UmkmModel>
 */
class UmkmModelFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'nama_umkm' => $this->faker->company(),
            'alamat_umkm' => $this->faker->address(),
            'deskripsi_umkm' => $this->faker->text(),
            'kontak_umkm' => $this->faker->phoneNumber(),
            'gambar_umkm' => 'fotoUmkm.jpg',
            'user_id' => rand(1, count(\App\Models\UserModel::select('user_id')->get()))
        ];
    }
}
