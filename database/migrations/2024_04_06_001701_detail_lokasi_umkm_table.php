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
        Schema::create('detail_lokasi_umkm', function (Blueprint $table) {
            $table->id('detail_lokasi_id');
            $table->unsignedBigInteger('umkm_id')->index();
            $table->foreign('umkm_id')->references('umkm_id')->on('umkm')->onDelete('cascade');
            $table->text('latitude_umkm');
            $table->text('longitude_umkm');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('detail_lokasi_umkm');
    }
};
