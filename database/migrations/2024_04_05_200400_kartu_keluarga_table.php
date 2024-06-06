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
        Schema::create('kartu_keluarga', function (Blueprint $table) {
            $table->id('kartu_keluarga_id');
            $table->string('no_kartu_keluarga', 16)->unique();
            $table->string('nama_kepala_keluarga', 255);
            $table->text('alamat_kk');
            $table->integer('jumlah_tanggungan');
            $table->string('kondisi_rumah');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('kartu_keluarga');
    }
};
