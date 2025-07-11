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
        Schema::create('keuangans', function (Blueprint $table) {
            $table->id();
            $table->foreignId('id_siswa')
                ->constrained('siswas')
                ->onDelete('cascade');
            $table->foreignId('id_jeniskeuangan')
                ->constrained('jeniskeuangans')
                ->onDelete('cascade');
            $table->date('tanggal_bayar');
            $table->decimal('jumlah', 10,2);
            $table->enum('metode_pembayaran', ['tunai','transfer']);
            $table->string('status');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('keuangans');
    }
};
