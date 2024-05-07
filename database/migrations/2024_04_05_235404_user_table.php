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
        Schema::create('user', function (Blueprint $table) {
            $table->id('user_id');
            $table->unsignedBigInteger('kartu_keluarga_id')->index();
            $table->foreign('kartu_keluarga_id')->references('kartu_keluarga_id')->on('kartu_keluarga')->onUpdate('cascade')->onDelete('cascade');
            $table->unsignedBigInteger('role_id')->index();
            $table->foreign('role_id')->references('role_id')->on('role');
            $table->string('nik_user', 16);
            $table->string('tempat');
            $table->date('tanggal_lahir');
            $table->string('gender');
            $table->string('status_kawin');
            $table->string('agama');
            $table->string('nomor_rw')->nullable();
            $table->string('nomor_rt')->nullable();
            $table->string('masa_jabatan_awal')->nullable();
            $table->string('masa_jabatan_akhir')->nullable();
            $table->string('nama_user', 255);
            $table->string('email_user', 255);
            $table->string('password_user');
            $table->integer('gaji_user');
            $table->string('pekerjaan_user', 255);
            $table->text('alamat_user');
            $table->text('foto_user');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('user');
    }
};
