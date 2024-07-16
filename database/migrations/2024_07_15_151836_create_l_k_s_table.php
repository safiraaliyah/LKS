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
        Schema::create('l_k_s', function (Blueprint $table) {
            $table->id();
            $table->foreignId('id_user')->unique()->constrained('users');
            $table->string('nama_lks')->nullable();
            $table->string('ketua_lks')->nullable();
            $table->longText('alamat_lks')->nullable();
            $table->integer('nomor_notaris')->nullable();
            $table->dateTime('tanggal_akte_notaris');
            $table->dateTime('kontrak_awal')->nullable();
            $table->dateTime('kontrak_akhir')->nullable();
            $table->string('kontak_pengurus')->nullable();
            $table->enum('akreditasi_lks', ['A', 'B', 'C'])->nullable();
            $table->enum('jenis_lks', ['LKS Kota', 'LKS Provinsi', 'LKS Nasional'])->nullable();
            $table->enum('jenis_pelayanan', ['Anak', 'Disabilitas', 'Lanjut Usia'])->nullable();
            $table->string('foto_lks')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('l_k_s');
    }
};
