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
        Schema::create('jadwals', function (Blueprint $table) {
            $table->id();
            $table->foreignId('id_kelas')
                ->constrained('kelas')
                ->onDelete('cascade');
            $table->foreignId('id_guru')
                ->constrained('gurus')
                ->onDelete('cascade');
            $table->foreignId('id_mapel')
                ->constrained('mapels')
                ->onDelete('cascade');
            $table->enum('hari', ['senin','selasa','rabu','kamis','jumat','sabtu']);
            $table->time('waktu_mulai');
            $table->time('waktu_selesai');
            $table->string('ruang');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('jadwals');
    }
};
