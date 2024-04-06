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
        Schema::create('detail_surat', function (Blueprint $table) {
            $table->id('detail_surat_id');
            $table->unsignedBigInteger('surat_id')->index();
            $table->foreign('surat_id')->references('surat_id')->on('surat')->onDelete('cascade');
            $table->date('tanggal_surat');
            $table->text('tanda_tangan_rt');
            $table->text('tanda_tangan_rw');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('detail_surat');
    }
};
