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
        Schema::create('pengajuan_bansos', function (Blueprint $table) {
            $table->id('pengajuan_id');
            $table->unsignedBigInteger('kartu_keluarga_id')->index();
            $table->foreign('kartu_keluarga_id')->references('kartu_keluarga_id')->on('kartu_keluarga');
            $table->string('pendapatan_keluarga');
            $table->string('tanggungan_warga');
            $table->string('nomor_rt');
            $table->string('nomor_rw');
            $table->text('alasan_warga');
            $table->date('tanggal_pengajuan');
            $table->text('file_sktm');
            $table->text('alasan_tolak')->nullable();
            $table->string('status_verif', 20);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pengajuan_bansos');
    }
};
