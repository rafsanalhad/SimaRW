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
        Schema::create('rekomendasi_bansos', function (Blueprint $table) {
            $table->id('rekomendasi_bansos_id');
            $table->unsignedBigInteger('kartu_keluarga_id')->index();
            $table->foreign('kartu_keluarga_id')->references('kartu_keluarga_id')->on('kartu_keluarga')->cascadeOnDelete();
            $table->text('usia');
            $table->text('kondisi_rumah');
            $table->text('pekerjaan');
            $table->text('jumlah_tanggungan');
            $table->text('total_gaji');
            $table->text('total_pembobotan');
            $table->string('status');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('rekomendasi_bansos');
    }
};
