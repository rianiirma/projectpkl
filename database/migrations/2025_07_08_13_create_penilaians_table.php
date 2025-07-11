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
        Schema::create('penilaians', function (Blueprint $table) {
            $table->id();
            $table->foreignId('id_siswa')
                ->constrained('siswas')
                ->onDelete('cascade');
            $table->foreignId('id_semester')
                ->constrained('semesters')
                ->onDelete('cascade');
            $table->enum('jenis_penilaian', ['harian','uts','uas']);
            $table->decimal('nilai', 5,2);
            $table->string('keterangan');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('penilaians');
    }
};
