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
        Schema::create('profils', function (Blueprint $table) {
            $table->id();
            $table->string('image')->nullable(); // Menganggap gambar bisa null
            $table->string('nama');
            $table->string('ketua');
            $table->text('alamat');
            $table->string('nomor_notaris');
            $table->date('tanggal_notaris');
            $table->string('nomor_daftar');
            $table->date('tanggal_daftar'); // Ubah tipe ke date
            $table->string('kontak'); // Ubah tipe ke string
            $table->string('akreditasi');
            $table->string('jenis_lks');
            $table->string('jenis_pelayanan');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('profils');
    }
};

