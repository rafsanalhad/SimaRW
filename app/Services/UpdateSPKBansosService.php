<?php

namespace App\Services;

use App\Models\KartuKeluargaModel;
use App\Models\RekomendasiBansosModel;
use App\Models\UserModel;

class UpdateSPKBansosService
{
    public function updateBansos()
    {
        RekomendasiBansosModel::truncate();

        $keluarga = KartuKeluargaModel::withCount('user')->get();
        $minMax = [];

        // Input data ke dalam array asosiatif
        foreach ($keluarga as $kriteriaBansos) {
            $kriteria = [
                'kartu_keluarga_id' => $kriteriaBansos->kartu_keluarga_id,
                'jumlah_anggota_keluarga' => $kriteriaBansos->user_count,
                'total_gaji' => UserModel::where('kartu_keluarga_id', $kriteriaBansos->kartu_keluarga_id)->sum('gaji_user'),
                'jumlah_tanggungan' => $kriteriaBansos->jumlah_tanggungan,
            ];

            $kriteriaList[] = $kriteria;
        }

        // Mencari Nilai Min Max
        $minMax = [
            'jumlah_anggota_keluarga' => [
                'min' => min(array_column($kriteriaList, 'jumlah_anggota_keluarga')),
                'max' => max(array_column($kriteriaList, 'jumlah_anggota_keluarga')),
            ],
            'total_gaji' => [
                'min' => min(array_column($kriteriaList, 'total_gaji')),
                'max' => max(array_column($kriteriaList, 'total_gaji')),
            ],
            'jumlah_tanggungan' => [
                'min' => min(array_column($kriteriaList, 'jumlah_tanggungan')),
                'max' => max(array_column($kriteriaList, 'jumlah_tanggungan')),
            ],
        ];


        // Mencari Nilai Normalisasi
        foreach ($kriteriaList as $kriteria) {
            $normalisasi[] = [
                'kartu_keluarga_id' => $kriteria['kartu_keluarga_id'],
                'jumlah_anggota_keluarga' => $minMax['jumlah_anggota_keluarga']['min'] / $kriteria['jumlah_anggota_keluarga'],
                'total_gaji' => $kriteria['total_gaji'] / $minMax['total_gaji']['max'],
                'jumlah_tanggungan' => $minMax['jumlah_tanggungan']['min'] / $kriteria['jumlah_tanggungan'],
            ];
        }


        // Melakukan pembobotan setelah normalisasi
        $bobot = [
            'jumlah_anggota_keluarga' => 0.4,
            'total_gaji' => 0.3,
            'jumlah_tanggungan' => 0.3,
        ];

        foreach ($normalisasi as $kriteria) {
            $hasilPembobotan[] = [
                'kartu_keluarga_id' => $kriteria['kartu_keluarga_id'],
                'jumlah_anggota_keluarga' => $kriteria['jumlah_anggota_keluarga'] * $bobot['jumlah_anggota_keluarga'],
                'total_gaji' => $kriteria['total_gaji'] * $bobot['total_gaji'],
                'jumlah_tanggungan' => $kriteria['jumlah_tanggungan'] * $bobot['jumlah_tanggungan'],
            ];
        }


        // Melakukan sum dan ranking dari hasil pembobotan
        foreach ($hasilPembobotan as $kriteria) {
            $hasil[] = [
                'kartu_keluarga_id' => $kriteria['kartu_keluarga_id'],
                'jumlah_anggota_keluarga' => $kriteria['jumlah_anggota_keluarga'],
                'total_gaji' => $kriteria['total_gaji'],
                'jumlah_tanggungan' => $kriteria['jumlah_tanggungan'],
                'hasil' => $kriteria['jumlah_anggota_keluarga'] + $kriteria['total_gaji'] + $kriteria['jumlah_tanggungan'],
            ];
        }

        // Melakukan input pada database
        foreach ($hasil as $kriteria) {
            if($kriteria['hasil'] < 0.5) {
                RekomendasiBansosModel::create([
                    'kartu_keluarga_id' => $kriteria['kartu_keluarga_id'],
                    'jumlah_anggota' => $kriteria['jumlah_anggota_keluarga'],
                    'total_gaji' => $kriteria['total_gaji'],
                    'jumlah_tanggungan' => $kriteria['jumlah_tanggungan'],
                    'total_pembobotan' => $kriteria['hasil'],
                    'status' => 'Tidak Layak'
                ]);
            } else {
                RekomendasiBansosModel::create([
                    'kartu_keluarga_id' => $kriteria['kartu_keluarga_id'],
                    'jumlah_anggota' => $kriteria['jumlah_anggota_keluarga'],
                    'total_gaji' => $kriteria['total_gaji'],
                    'jumlah_tanggungan' => $kriteria['jumlah_tanggungan'],
                    'total_pembobotan' => $kriteria['hasil'],
                    'status' => 'Layak'
                ]);
            }
        }
    }
}
