<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\UserModel>
 */
class UserModelFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'kartu_keluarga_id' => rand(1, count(\App\Models\KartuKeluargaModel::select('kartu_keluarga_id')->get())),
            'role_id' => rand(1, count(\App\Models\RoleModel::select('role_id')->get())),
            'nik_user' => fake()->nik(),
            'nama_user' => fake()->name(),
            'email_user' => fake()->unique()->safeEmail(),
            'password_user' => fake()->password(),
            'gaji_user' => rand(1000000, 5000000),
            'pekerjaan_user' => fake()->jobTitle(),
            'nomor_rt' => rand(1, 5),
            'nomor_rw' => rand(1, 5),
            'masa_jabatan_awal' => fake()->date(),
            'masa_jabatan_akhir' => fake()->date(),
            'tempat' => fake()->city(),
            'tanggal_lahir' => fake()->date(),
            'gender' => fake()->randomElement(['Laki-laki', 'Perempuan']),
            'status_kawin' => fake()->randomElement(['Kawin', 'Belum Kawin']),
            'agama' => fake()->randomElement(['Islam', 'Kristen', 'Katolik', 'Hindu', 'Budha', 'Konghucu']),
            'alamat_user' => fake()->address()
        ];
    }
}
