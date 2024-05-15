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
        Schema::create('iuran', function (Blueprint $table) {
            $table->id('iuran_id');
            $table->unsignedBigInteger('kartu_keluarga_id')->index();
            $table->foreign('kartu_keluarga_id')->references('kartu_keluarga_id')->on('kartu_keluarga');
            $table->date('tanggal_iuran');
            $table->date('tanggal_bayar')->nullable();
            $table->text('snap_token')->nullable();
            $table->string('status', 20);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('iuran');
    }
};
