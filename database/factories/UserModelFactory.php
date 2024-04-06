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
        ];
    }
}
