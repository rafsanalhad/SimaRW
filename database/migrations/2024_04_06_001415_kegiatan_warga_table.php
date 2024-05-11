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
        Schema::create('kegiatan_warga', function (Blueprint $table) {
            $table->id('kegiatan_id');
            $table->string('nama_kegiatan');
            $table->text('deskripsi_kegiatan');
            $table->date('jadwal_kegiatan');
            $table->time('jam_awal');
            $table->time('jam_akhir');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('kegiatan_warga');
    }
};
