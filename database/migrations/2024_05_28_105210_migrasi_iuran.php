<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('migrasi_iuran', function (Blueprint $table) {
            $table->id('migrasi_iuran_id');
            $table->string('nama_pelapor')->nullable();
            $table->string('jabatan_pelapor')->nullable();
            $table->string('nomor_rt')->nullable();
            $table->string('nomor_rw')->nullable();
            $table->double('jumlah_pengeluaran')->nullable();
            $table->string('bukti_struk')->nullable();
            $table->string('keterangan_pengeluaran')->nullable();
            $table->date('tanggal_migrasi');
            $table->double('dana_keluar')->nullable();
            $table->double('dana_masuk')->nullable();
            $table->double('sisa_saldo');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('migrasi_iuran');
    }
};
