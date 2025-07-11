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
        Schema::create('absensis', function (Blueprint $table) {
            $table->id();
            $table->foreignId('id_siswa')
                ->constrained('siswas')
                ->onDelete('cascade');
            $table->foreignId('id_jadwal')
                ->constrained('jadwals')
                ->onDelete('cascade');
            $table->date('tanggal');
            $table->enum('status', ['hadir','izin','sakit','alpa']);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('absensis');
    }
};
