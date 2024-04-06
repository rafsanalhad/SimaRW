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
        Schema::create('penerimaan_bansos', function (Blueprint $table) {
            $table->id('penerimaan_id');
            $table->unsignedBigInteger('pengajuan_id')->index();
            $table->foreign('pengajuan_id')->references('pengajuan_id')->on('pengajuan_bansos')->onDelete('cascade')->onUpdate('cascade');
            $table->date('tanggal_penerimaan');
            $table->text('bukti_penerimaan');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('detail_pengajuan_bansos');
    }
};
