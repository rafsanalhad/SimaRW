<?php

namespace Database\Factories;

use App\Models\RoleModel;
use App\Models\KartuKeluargaModel;
use Illuminate\Support\Facades\Hash;
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
        static $count = 0;
        $nik_user = fake()->nik();

        $kartuKeluarga = KartuKeluargaModel::orderBy('kartu_keluarga_id', 'asc')->skip($count)->take(1)->first();
        $count++;

        if($count <= KartuKeluargaModel::count() && $kartuKeluarga) {
            return [
                'kartu_keluarga_id' => $kartuKeluarga->kartu_keluarga_id,
                'role_id' => fake()->randomElement([1, 2, 4]),
                'nik_user' => $nik_user,
                'nama_user' => $kartuKeluarga->nama_kepala_keluarga,
                'email_user' => fake()->unique()->safeEmail(),
                'password' => Hash::make($nik_user),
                'gaji_user' => rand(1000000, 5000000),
                'pekerjaan_user' => fake()->randomElement(['PNS', 'TNI', 'Pegawai Swasta', 'Wiraswasta', 'Petani', 'Buruh', 'Sopir', 'Tidak Bekerja', 'Pekerjaan Lainnya']),
                'nomor_rt' => rand(1, 5),
                'nomor_rw' => rand(1, 5),
                'masa_jabatan_awal' => fake()->date(),
                'masa_jabatan_akhir' => fake()->date(),
                'tempat' => fake()->city(),
                'tanggal_lahir' => fake()->date(),
                'gender' => fake()->randomElement(['Laki-laki', 'Perempuan']),
                'status_kawin' => fake()->randomElement(['Kawin', 'Belum Kawin']),
                'agama' => fake()->randomElement(['Islam', 'Kristen', 'Katolik', 'Hindu', 'Budha', 'Konghucu']),
                'alamat_user' => fake()->address(),
                'foto_user' => 'User-Images/default.jpeg'
            ];
        } else {
            return [
                'kartu_keluarga_id' => rand(1, KartuKeluargaModel::count()),
                'role_id' => fake()->randomElement([1, 2, 4]),
                'nik_user' => $nik_user,
                'nama_user' => fake()->name(),
                'email_user' => fake()->unique()->safeEmail(),
                'password' => Hash::make($nik_user),
                'gaji_user' => rand(1000000, 5000000),
                'pekerjaan_user' => fake()->randomElement(['PNS', 'TNI', 'Pegawai Swasta', 'Wiraswasta', 'Petani', 'Buruh', 'Sopir', 'Tidak Bekerja', 'Pekerjaan Lainnya']),
                'nomor_rt' => rand(1, 5),
                'nomor_rw' => rand(1, 5),
                'masa_jabatan_awal' => fake()->date(),
                'masa_jabatan_akhir' => fake()->date(),
                'tempat' => fake()->city(),
                'tanggal_lahir' => fake()->date(),
                'gender' => fake()->randomElement(['Laki-laki', 'Perempuan']),
                'status_kawin' => fake()->randomElement(['Kawin', 'Belum Kawin']),
                'agama' => fake()->randomElement(['Islam', 'Kristen', 'Katolik', 'Hindu', 'Budha', 'Konghucu']),
                'alamat_user' => fake()->address(),
                'foto_user' => 'User-Images/default.jpeg'
            ];
        }
    }
}
