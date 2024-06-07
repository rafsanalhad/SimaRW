<?php

namespace App\Services;

use App\Models\KartuKeluargaModel;
use App\Models\RekomendasiBansosSPKVikorModel;
use App\Models\UserModel;


class UpdateSPKVikorService {
    public function updateBansos() {
        RekomendasiBansosSPKVikorModel::truncate();

        // Get All Kartu Keluarga
        $kartuKeluarga = KartuKeluargaModel::whereHas('user', function($query) {
            $query->whereNotIn('pekerjaan_user', ['PNS', 'TNI']);
        })->get();

        // Bobot Kriteria
        $bobot = [
            'usia' => 2,
            'kondisi_rumah' => 4,
            'pekerjaan' => 4,
            'total_gaji' => 5,
            'jumlah_tanggungan' => 3
        ];

        // Bobot Masing Masing Kriteria
        $bobotKriteria = [
            'usia' => [
                '60+' => 5,
                '50-59' => 4,
                '40-49' => 3,
                '30-39' => 2,
                '20-29' => 1,
            ],
            'kondisi_rumah' => [
                'Sangat Buruk' => 5,
                'Buruk' => 4,
                'Sedang' => 3,
                'Bagus' => 2,
                'Sangat Bagus' => 1
            ],
            'pekerjaan' => [
                'Pegawai Swasta' => 1,
                'Wiraswasta' => 2,
                'Petani' => 4,
                'Sopir' => 3,
                'Buruh' => 4,
                'Tidak Bekerja' => 5,
                'Pekerjaan Lainnya' => 1
            ],
            'total_gaji' => [
                '0' => 5,
                '1-2000000' => 4,
                '2000001-5000000' => 3,
                '5000001-8000000' => 2,
                '8000001-10000000' => 1,
            ],
            'jumlah_tanggungan' => [
                '1-2' => 1,
                '3-4' => 2,
                '5-6' => 3,
                '7-8' => 4,
                '9+' => 5
            ]
        ];


        // Memasukkan kriteria ke dalam array
        foreach ($kartuKeluarga as $kk) {
            $kepalaKeluarga = UserModel::where('nama_user', $kk->nama_kepala_keluarga)->where('kartu_keluarga_id', $kk->kartu_keluarga_id)->first();

            $kriteriaList[] = [
                'kartu_keluarga_id' => $kk->kartu_keluarga_id,
                'pekerjaan' => $kepalaKeluarga->pekerjaan_user,
                'usia' => date_diff(date_create($kepalaKeluarga->tanggal_lahir), date_create('now'))->y,
                'total_gaji' => UserModel::where('kartu_keluarga_id', $kk->kartu_keluarga_id)->sum('gaji_user'),
                'jumlah_tanggungan' => $kk->jumlah_tanggungan,
                'kondisi_rumah' => $kk->kondisi_rumah
            ];
        }


        // Melakukan Pembobotan Masing Masing Kriteria
        foreach ($kriteriaList as $kriteria) {
            // Pembobotan Kriteria Pekerjaan
            $bobotPekerjaan = $kriteria['pekerjaan'];

            if($bobotPekerjaan == 'Pegawai Swasta') {
                $bobotPekerjaan = $bobotKriteria['pekerjaan']['Pegawai Swasta'];
            } else if($bobotPekerjaan == 'Wiraswasta') {
                $bobotPekerjaan = $bobotKriteria['pekerjaan']['Wiraswasta'];
            } else if($bobotPekerjaan == 'Petani') {
                $bobotPekerjaan = $bobotKriteria['pekerjaan']['Petani'];
            } else if($bobotPekerjaan == 'Buruh') {
                $bobotPekerjaan = $bobotKriteria['pekerjaan']['Buruh'];
            } else if($bobotPekerjaan == 'Sopir') {
                $bobotPekerjaan = $bobotKriteria['pekerjaan']['Sopir'];
            } else if($bobotPekerjaan == 'Tidak Bekerja') {
                $bobotPekerjaan = $bobotKriteria['pekerjaan']['Tidak Bekerja'];
            } else {
                $bobotPekerjaan = $bobotKriteria['pekerjaan']['Pekerjaan Lainnya'];
            }

            // Pembobotan Kriteria Usia
            $bobotUsia = $kriteria['usia'];

            if($bobotUsia >= 60) {
                $bobotUsia = $bobotKriteria['usia']['60+'];
            } else if($bobotUsia >= 50 && $bobotUsia <= 59) {
                $bobotUsia = $bobotKriteria['usia']['50-59'];
            } else if($bobotUsia >= 40 && $bobotUsia <= 49) {
                $bobotUsia = $bobotKriteria['usia']['40-49'];
            } else if($bobotUsia >= 30 && $bobotUsia <= 39) {
                $bobotUsia = $bobotKriteria['usia']['30-39'];
            } else {
                $bobotUsia = $bobotKriteria['usia']['20-29'];
            }

            // Pembobotan Kriteria Kondisi Rumah
            $bobotKondisiRumah = $kriteria['kondisi_rumah'];

            if($bobotKondisiRumah == 'Sangat Buruk') {
                $bobotKondisiRumah = $bobotKriteria['kondisi_rumah']['Sangat Buruk'];
            } else if($bobotKondisiRumah == 'Buruk') {
                $bobotKondisiRumah = $bobotKriteria['kondisi_rumah']['Buruk'];
            } else if($bobotKondisiRumah == 'Sedang') {
                $bobotKondisiRumah = $bobotKriteria['kondisi_rumah']['Sedang'];
            } else if($bobotKondisiRumah == 'Bagus') {
                $bobotKondisiRumah = $bobotKriteria['kondisi_rumah']['Bagus'];
            } else {
                $bobotKondisiRumah = $bobotKriteria['kondisi_rumah']['Sangat Bagus'];
            }

            // Pembobotan Kriteria Total Gaji
            $bobotTotalGaji = $kriteria['total_gaji'];

            if($bobotTotalGaji == 0) {
                $bobotTotalGaji = $bobotKriteria['total_gaji']['0'];
            } else if($bobotTotalGaji >= 1 && $bobotTotalGaji <= 2000000) {
                $bobotTotalGaji = $bobotKriteria['total_gaji']['1-2000000'];
            } else if($bobotTotalGaji >= 2000001 && $bobotTotalGaji <= 5000000) {
                $bobotTotalGaji = $bobotKriteria['total_gaji']['2000001-5000000'];
            } else if($bobotTotalGaji >= 5000001 && $bobotTotalGaji <= 8000000) {
                $bobotTotalGaji = $bobotKriteria['total_gaji']['5000001-8000000'];
            } else {
                $bobotTotalGaji = $bobotKriteria['total_gaji']['8000001-10000000'];
            }

            // Pembobotan Kriteria Jumlah Tanggungan
            $bobotTanggungan = $kriteria['jumlah_tanggungan'];

            if($bobotTanggungan >= 1 && $bobotTanggungan <= 2) {
                $bobotTanggungan = $bobotKriteria['jumlah_tanggungan']['1-2'];
            } else if($bobotTanggungan >= 3 && $bobotTanggungan <= 4) {
                $bobotTanggungan = $bobotKriteria['jumlah_tanggungan']['3-4'];
            } else if($bobotTanggungan >= 5 && $bobotTanggungan <= 6) {
                $bobotTanggungan = $bobotKriteria['jumlah_tanggungan']['5-6'];
            } else if($bobotTanggungan >= 7 && $bobotTanggungan <= 8) {
                $bobotTanggungan = $bobotKriteria['jumlah_tanggungan']['7-8'];
            } else {
                $bobotTanggungan = $bobotKriteria['jumlah_tanggungan']['9+'];
            }

            // Menyimpan Hasil Pembobotan
            $hasilPembobotan[] = [
                'kartu_keluarga_id' => $kriteria['kartu_keluarga_id'],
                'pekerjaan' => $bobotPekerjaan,
                'usia' => $bobotUsia,
                'kondisi_rumah' => $bobotKondisiRumah,
                'total_gaji' => $bobotTotalGaji,
                'jumlah_tanggungan' => $bobotTanggungan
            ];
        }

        // Menentukan NIlai Min Max Setiap Kriteria
        $minMax = [
            'pekerjaan' => [
                'min' => min(array_column($hasilPembobotan, 'pekerjaan')),
                'max' => max(array_column($hasilPembobotan, 'pekerjaan'))
            ],
            'usia' => [
                'min' => min(array_column($hasilPembobotan, 'usia')),
                'max' => max(array_column($hasilPembobotan, 'usia'))
            ],
            'kondisi_rumah' => [
                'min' => min(array_column($hasilPembobotan, 'kondisi_rumah')),
                'max' => max(array_column($hasilPembobotan, 'kondisi_rumah'))
            ],
            'total_gaji' => [
                'min' => min(array_column($hasilPembobotan, 'total_gaji')),
                'max' => max(array_column($hasilPembobotan, 'total_gaji'))
            ],
            'jumlah_tanggungan' => [
                'min' => min(array_column($hasilPembobotan, 'jumlah_tanggungan')),
                'max' => max(array_column($hasilPembobotan, 'jumlah_tanggungan'))
            ]
        ];


        // Melakukan Normalisasi Kriteria dan Alternatif
        foreach ($hasilPembobotan as $bobot) {
            $hasilNormalisasi[] = [
                'kartu_keluarga_id' => $bobot['kartu_keluarga_id'],
                'pekerjaan' => $minMax['pekerjaan']['max'] - $bobot['pekerjaan'] / ($minMax['pekerjaan']['max'] - $minMax['pekerjaan']['min']),
                'usia' => $minMax['usia']['max'] - $bobot['usia'] / ($minMax['usia']['max'] - $minMax['usia']['min']),
                'kondisi_rumah' => $minMax['kondisi_rumah']['max'] - $bobot['kondisi_rumah'] / ($minMax['kondisi_rumah']['max'] - $minMax['kondisi_rumah']['min']),
                'total_gaji' => $minMax['total_gaji']['max'] - $bobot['total_gaji'] / ($minMax['total_gaji']['max'] - $minMax['total_gaji']['min']),
                'jumlah_tanggungan' => $minMax['jumlah_tanggungan']['max'] - $bobot['jumlah_tanggungan'] / ($minMax['jumlah_tanggungan']['max'] - $minMax['jumlah_tanggungan']['min'])
            ];
        }

        // Menentukan Nilai Utility
        foreach ($hasilNormalisasi as $normalisasi) {
            $utility[] = [
                'kartu_keluarga_id' => $normalisasi['kartu_keluarga_id'],
                'pekerjaan' => $normalisasi['pekerjaan'] * $bobot['pekerjaan'],
                'usia' => $normalisasi['usia'] * $bobot['usia'],
                'kondisi_rumah' => $normalisasi['kondisi_rumah'] * $bobot['kondisi_rumah'],
                'total_gaji' => $normalisasi['total_gaji'] * $bobot['total_gaji'],
                'jumlah_tanggungan' => $normalisasi['jumlah_tanggungan'] * $bobot['jumlah_tanggungan']
            ];
        }

        // Menjumlahkan nilai utility
        foreach($utility as $util) {
            $sumUtility[] = [
                'kartu_keluarga_id' => $util['kartu_keluarga_id'],
                'totalUtility' => $util['pekerjaan'] + $util['usia'] + $util['kondisi_rumah'] + $util['total_gaji'] + $util['jumlah_tanggungan']
            ];
        }

        // Menentukan Nilai Regreate
        foreach ($utility as $util) {
            $regreate[] = [
                'regreate' => max($util['pekerjaan'], $util['usia'], $util['kondisi_rumah'], $util['total_gaji'], $util['jumlah_tanggungan'])
            ];
        }

        // Mencari Nilai Minmax Utility
        $minMaxUtility = [
            'max' => max(array_column($sumUtility, 'totalUtility')),
            'min' => min(array_column($sumUtility, 'totalUtility'))
        ];

        // Mencari Nilai Minmax Regreate
        $minMaxRegreate = [
            'max' => max(array_column($regreate, 'regreate')),
            'min' => min(array_column($regreate, 'regreate'))
        ];

        // Menggabungkan Utility dan Regreate
        $utilRegreate = array_map(function($util, $regreate) {
            return [
                'kartu_keluarga_id' => $util['kartu_keluarga_id'],
                'totalUtility' => $util['totalUtility'],
                'regreate' => $regreate['regreate']
            ];
        }, $sumUtility, $regreate);


        // Menentukan Nilai Indeks Vikor
        $v = 0.5;
        foreach ($utilRegreate as $vikor) {
            $indeksVikor[] = [
                'kartu_keluarga_id' => $vikor['kartu_keluarga_id'],
                'hasilIndeks' => ($vikor['totalUtility'] - $minMaxUtility['min'] / ($minMaxUtility['max'] - $minMaxUtility['min'])) * $v + ($vikor['regreate'] - $minMaxRegreate['min'] / ($minMaxRegreate['max'] - $minMaxRegreate['min'])) * (1 - $v),
            ];
        }

        // Mencari Median Indeks Vikor
        $median = collect(array_column($indeksVikor, 'hasilIndeks'))->median();

        // Input Database
        foreach ($indeksVikor as $indeks) {
            if($indeks['hasilIndeks'] >= $median) {
                RekomendasiBansosSPKVikorModel::create([
                    'kartu_keluarga_id' => $indeks['kartu_keluarga_id'],
                    'hasil_indeks' => $indeks['hasilIndeks'],
                    'status' => 'Tidak Layak'
                ]);
            } else {
                RekomendasiBansosSPKVikorModel::create([
                    'kartu_keluarga_id' => $indeks['kartu_keluarga_id'],
                    'hasil_indeks' => $indeks['hasilIndeks'],
                    'status' => 'Layak'
                ]);
            }
        }
    }
}
