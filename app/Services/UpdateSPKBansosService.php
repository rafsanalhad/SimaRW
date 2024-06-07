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

        $keluarga = KartuKeluargaModel::whereHas('user', function($query) {
            $query->whereNotIn('pekerjaan_user', ['PNS', 'TNI']);
        })->get();
        $minMax = [];

        // Input data ke dalam array asosiatif
        foreach ($keluarga as $kriteriaBansos) {
            $kepalaKeluarga = UserModel::where('nama_user', $kriteriaBansos->nama_kepala_keluarga)->where('kartu_keluarga_id', $kriteriaBansos->kartu_keluarga_id)->first();

            $kriteria = [
                'kartu_keluarga_id' => $kriteriaBansos->kartu_keluarga_id,
                'pekerjaan_user' => $kepalaKeluarga->pekerjaan_user,
                'usia' => date_diff(date_create($kepalaKeluarga->tanggal_lahir), date_create('now'))->y,
                'total_gaji' => UserModel::where('kartu_keluarga_id', $kriteriaBansos->kartu_keluarga_id)->sum('gaji_user'),
                'jumlah_tanggungan' => $kriteriaBansos->jumlah_tanggungan,
                'kondisi_rumah' => $kriteriaBansos->kondisi_rumah,
            ];

            $kriteriaList[] = $kriteria;
        }


        // Melakukan Pembobotan terhadap kriteria usia, pekerjaan, kondisi rumah
        $bobotKriteria = [
            'usia' => [
                '60+' => 1,
                '50-59' => 0.8,
                '40-49' => 0.6,
                '30-39' => 0.4,
                '20-29' => 0.2,
                '0-19' => 0.05
            ],
            'kondisi_rumah' => [
                'Sangat Buruk' => 1,
                'Buruk' => 0.8,
                'Sedang' => 0.6,
                'Bagus' => 0.2,
                'Sangat Bagus' => 0.05
            ],
            'pekerjaan' => [
                'Pegawai Swasta' => 0.2,
                'Wiraswasta' => 0.6,
                'Petani' => 1,
                'Buruh' => 0.8,
                'Sopir' => 0.5,
                'Tidak Bekerja' => 1,
                'Pekerjaan Lainnya' => 0.1
            ],
            'total_gaji' => [
                '0' => 1,
                '1-2000000' => 0.8,
                '2000001-5000000' => 0.6,
                '5000001-8000000' => 0.4,
                '8000001-10000000' => 0.2,
                '10000000+' => 0.05
            ],
            'jumlah_tanggungan' => [
                '0' => 0.05,
                '1-2' => 0.2,
                '3-4' => 0.4,
                '5-6' => 0.6,
                '7-8' => 0.8,
                '9+' => 1
            ]
        ];

        // Menghitung Pembobotan Kriteria usia, pekerjaan, kondisi rumah
        foreach($kriteriaList as $kriteria) {
            // Pembobotan Usia
            $usiaBobot = $kriteria['usia'];

            if($usiaBobot >= 60) {
                $usiaBobot = $bobotKriteria['usia']['60+'];
            } else if($usiaBobot >= 50 && $usiaBobot <= 59) {
                $usiaBobot = $bobotKriteria['usia']['50-59'];
            } else if($usiaBobot >= 40 && $usiaBobot <= 49) {
                $usiaBobot = $bobotKriteria['usia']['40-49'];
            } else if($usiaBobot >= 30 && $usiaBobot <= 39) {
                $usiaBobot = $bobotKriteria['usia']['30-39'];
            } else if($usiaBobot >= 20 && $usiaBobot <= 29) {
                $usiaBobot = $bobotKriteria['usia']['20-29'];
            } else {
                $usiaBobot = $bobotKriteria['usia']['0-19'];
            }

            // Pembobotan Pekerjaan
            $pekerjaanBobot = $kriteria['pekerjaan_user'];

            if($pekerjaanBobot == 'Pegawai Swasta') {
                $pekerjaanBobot = $bobotKriteria['pekerjaan']['Pegawai Swasta'];
            } else if($pekerjaanBobot == 'Wiraswasta') {
                $pekerjaanBobot = $bobotKriteria['pekerjaan']['Wiraswasta'];
            } else if($pekerjaanBobot == 'Petani') {
                $pekerjaanBobot = $bobotKriteria['pekerjaan']['Petani'];
            } else if($pekerjaanBobot == 'Buruh') {
                $pekerjaanBobot = $bobotKriteria['pekerjaan']['Buruh'];
            } else if($pekerjaanBobot == 'Sopir') {
                $pekerjaanBobot = $bobotKriteria['pekerjaan']['Sopir'];
            } else if($pekerjaanBobot == 'Tidak Bekerja') {
                $pekerjaanBobot = $bobotKriteria['pekerjaan']['Tidak Bekerja'];
            } else {
                $pekerjaanBobot = $bobotKriteria['pekerjaan']['Pekerjaan Lainnya'];
            }

            // Pembobotan Kondisi Rumah
            $kondisiRumahBobot = $kriteria['kondisi_rumah'];

            if($kondisiRumahBobot == 'Sangat Buruk') {
                $kondisiRumahBobot = $bobotKriteria['kondisi_rumah']['Sangat Buruk'];
            } else if($kondisiRumahBobot == 'Buruk') {
                $kondisiRumahBobot = $bobotKriteria['kondisi_rumah']['Buruk'];
            } else if($kondisiRumahBobot == 'Sedang') {
                $kondisiRumahBobot = $bobotKriteria['kondisi_rumah']['Sedang'];
            } else if($kondisiRumahBobot == 'Bagus') {
                $kondisiRumahBobot = $bobotKriteria['kondisi_rumah']['Bagus'];
            } else {
                $kondisiRumahBobot = $bobotKriteria['kondisi_rumah']['Sangat Bagus'];
            }

            // Pembobotan Total Pendapatan
            $totalGajiBobot = $kriteria['total_gaji'];

            if($totalGajiBobot == 0) {
                $totalGajiBobot = $bobotKriteria['total_gaji']['0'];
            } else if($totalGajiBobot >= 1 && $totalGajiBobot <= 2000000) {
                $totalGajiBobot = $bobotKriteria['total_gaji']['1-2000000'];
            } else if($totalGajiBobot >= 2000001 && $totalGajiBobot <= 5000000) {
                $totalGajiBobot = $bobotKriteria['total_gaji']['2000001-5000000'];
            } else if($totalGajiBobot >= 5000001 && $totalGajiBobot <= 8000000) {
                $totalGajiBobot = $bobotKriteria['total_gaji']['5000001-8000000'];
            } else if($totalGajiBobot >= 8000001 && $totalGajiBobot <= 10000000) {
                $totalGajiBobot = $bobotKriteria['total_gaji']['8000001-10000000'];
            } else {
                $totalGajiBobot = $bobotKriteria['total_gaji']['10000000+'];
            }

            // Pembobotan Jumlah Tanggungan
            $jumlahTanggunganBobot = $kriteria['jumlah_tanggungan'];

            if($jumlahTanggunganBobot == 0) {
                $jumlahTanggunganBobot = $bobotKriteria['jumlah_tanggungan']['0'];
            } else if($jumlahTanggunganBobot >= 1 && $jumlahTanggunganBobot <= 2) {
                $jumlahTanggunganBobot = $bobotKriteria['jumlah_tanggungan']['1-2'];
            } else if($jumlahTanggunganBobot >= 3 && $jumlahTanggunganBobot <= 4) {
                $jumlahTanggunganBobot = $bobotKriteria['jumlah_tanggungan']['3-4'];
            } else if($jumlahTanggunganBobot >= 5 && $jumlahTanggunganBobot <= 6) {
                $jumlahTanggunganBobot = $bobotKriteria['jumlah_tanggungan']['5-6'];
            } else if($jumlahTanggunganBobot >= 7 && $jumlahTanggunganBobot <= 8) {
                $jumlahTanggunganBobot = $bobotKriteria['jumlah_tanggungan']['7-8'];
            } else {
                $jumlahTanggunganBobot = $bobotKriteria['jumlah_tanggungan']['9+'];
            }

            $menghitungPembobotan[] = [
                'kartu_keluarga_id' => $kriteria['kartu_keluarga_id'],
                'usia' => $usiaBobot,
                'pekerjaan' => $pekerjaanBobot,
                'kondisi_rumah' => $kondisiRumahBobot,
                'total_gaji' => $totalGajiBobot,
                'jumlah_tanggungan' => $jumlahTanggunganBobot
            ];
        }

        // Mencari Nilai Min Max
        $minMax = [
            'usia' => [
                'min' => min(array_column($menghitungPembobotan, 'usia')),
                'max' => max(array_column($menghitungPembobotan, 'usia')),
            ],
            'kondisi_rumah' => [
                'min' => min(array_column($menghitungPembobotan, 'kondisi_rumah')),
                'max' => max(array_column($menghitungPembobotan, 'kondisi_rumah')),
            ],
            'pekerjaan' => [
                'min' => min(array_column($menghitungPembobotan, 'pekerjaan')),
                'max' => max(array_column($menghitungPembobotan, 'pekerjaan')),
            ],
            'total_gaji' => [
                'min' => min(array_column($menghitungPembobotan, 'total_gaji')),
                'max' => max(array_column($menghitungPembobotan, 'total_gaji')),
            ],
            'jumlah_tanggungan' => [
                'min' => min(array_column($menghitungPembobotan, 'jumlah_tanggungan')),
                'max' => max(array_column($menghitungPembobotan, 'jumlah_tanggungan')),
            ],
        ];



        // Mencari Nilai Normalisasi
        foreach ($menghitungPembobotan as $kriteria) {
            $normalisasi[] = [
                'kartu_keluarga_id' => $kriteria['kartu_keluarga_id'],
                'usia' => $kriteria['usia'] / $minMax['usia']['max'],
                'kondisi_rumah' => $minMax['kondisi_rumah']['min'] / $kriteria['kondisi_rumah'],
                'pekerjaan' => $minMax['pekerjaan']['min'] / $kriteria['pekerjaan'],
                'total_gaji' => $kriteria['total_gaji'] / $minMax['total_gaji']['max'],
                'jumlah_tanggungan' => $minMax['jumlah_tanggungan']['min'] / $kriteria['jumlah_tanggungan'],
            ];
        }


        // Melakukan pembobotan setelah normalisasi
        $bobot = [
            'usia' => 0.3,
            'kondisi_rumah' => 0.2,
            'pekerjaan' => 0.2,
            'total_gaji' => 0.3,
            'jumlah_tanggungan' => 0.4,
        ];

        foreach ($normalisasi as $kriteria) {
            $hasilPembobotan[] = [
                'kartu_keluarga_id' => $kriteria['kartu_keluarga_id'],
                'usia' => $kriteria['usia'] * $bobot['usia'],
                'kondisi_rumah' => $kriteria['kondisi_rumah'] * $bobot['kondisi_rumah'],
                'pekerjaan' => $kriteria['pekerjaan'] * $bobot['pekerjaan'],
                'total_gaji' => $kriteria['total_gaji'] * $bobot['total_gaji'],
                'jumlah_tanggungan' => $kriteria['jumlah_tanggungan'] * $bobot['jumlah_tanggungan'],
            ];
        }


        // Melakukan sum dan ranking dari hasil pembobotan
        foreach ($hasilPembobotan as $kriteria) {
            $hasil[] = [
                'kartu_keluarga_id' => $kriteria['kartu_keluarga_id'],
                'usia' => $kriteria['usia'],
                'kondisi_rumah' => $kriteria['kondisi_rumah'],
                'pekerjaan' => $kriteria['pekerjaan'],
                'total_gaji' => $kriteria['total_gaji'],
                'jumlah_tanggungan' => $kriteria['jumlah_tanggungan'],
                'hasil' => $kriteria['total_gaji'] + $kriteria['jumlah_tanggungan'] + $kriteria['usia'] + $kriteria['kondisi_rumah'] + $kriteria['pekerjaan'],
            ];
        }


        // Mencari Nilai Median dari hasil pembobotan
        $median = collect(array_column($hasil, 'hasil'))->median();

        // Melakukan input pada database
        foreach ($hasil as $kriteria) {
            if($kriteria['hasil'] <= $median) {
                RekomendasiBansosModel::create([
                    'kartu_keluarga_id' => $kriteria['kartu_keluarga_id'],
                    'usia' => $kriteria['usia'],
                    'kondisi_rumah' => $kriteria['kondisi_rumah'],
                    'pekerjaan' => $kriteria['pekerjaan'],
                    'total_gaji' => $kriteria['total_gaji'],
                    'jumlah_tanggungan' => $kriteria['jumlah_tanggungan'],
                    'total_pembobotan' => $kriteria['hasil'],
                    'status' => 'Tidak Layak'
                ]);
            } else {
                RekomendasiBansosModel::create([
                    'kartu_keluarga_id' => $kriteria['kartu_keluarga_id'],
                    'usia' => $kriteria['usia'],
                    'kondisi_rumah' => $kriteria['kondisi_rumah'],
                    'pekerjaan' => $kriteria['pekerjaan'],
                    'total_gaji' => $kriteria['total_gaji'],
                    'jumlah_tanggungan' => $kriteria['jumlah_tanggungan'],
                    'total_pembobotan' => $kriteria['hasil'],
                    'status' => 'Layak'
                ]);
            }
        }
    }
}
