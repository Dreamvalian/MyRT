<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{

    public function up(): void
    {
        Schema::create('residents', function (Blueprint $table) {
            $table->bigInteger('nik')->primary();
            $table->bigInteger('nomor_kk');
            $table->string('nama_lengkap');
            $table->string('alamat');
            $table->date('tanggal_lahir');
            $table->string('tempat_lahir');
            $table->string('agama');
            $table->string('jenis_kelamin');
            $table->string('jenis_pekerjaan');
            $table->string('pendidikan');
            $table->string('status_perkawinan');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('residents');
    }
};
