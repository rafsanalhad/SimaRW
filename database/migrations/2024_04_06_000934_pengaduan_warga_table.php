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
        Schema::create('pengaduan_warga', function (Blueprint $table) {
            $table->id('pengaduan_id');
            $table->unsignedBigInteger('user_id')->index();
            $table->foreign('user_id')->references('user_id')->on('user');
            $table->date('tanggal_pengaduan');
            $table->text('isi_pengaduan');
            $table->string('nomor_rt');
            $table->string('nomor_rw');
            $table->string('status_pengaduan', 25);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pengaduan_warga');
    }
};
