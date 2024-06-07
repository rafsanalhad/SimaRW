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
        Schema::create('umkm', function (Blueprint $table) {
            $table->id('umkm_id');
            $table->unsignedBigInteger('user_id')->index();
            $table->foreign('user_id')->references('user_id')->on('user')->cascadeOnDelete();
            $table->string('nama_umkm', 255);
            $table->text('alamat_umkm');
            $table->string('kontak_umkm', 255);
            $table->text('deskripsi_umkm');
            $table->time('jam_operasional_awal');
            $table->time('jam_operasional_akhir');
            $table->text('gambar_umkm');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('umkm');
    }
};
