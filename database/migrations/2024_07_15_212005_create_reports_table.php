<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
  use Illuminate\Support\Facades\DB;
  use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('reports', function (Blueprint $table) {
          $table->id();
          $table->foreignId('id_lks')->constrained('l_k_s');
          $table->enum('periode', ['Triwulan 1', 'Triwulan 2', 'Triwulan 3', 'Triwulan 4']);
          $table->string('laporan');
          $table->year('year')->default(DB::raw('YEAR(CURDATE())'));
          $table->timestamps(0);
        });

      Schema::table('reports', function (Blueprint $table) {
        $table->timestamp('created_at')->useCurrent()->change();
        $table->timestamp('updated_at')->useCurrent()->useCurrentOnUpdate()->change();
      });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('reports');
    }
};
