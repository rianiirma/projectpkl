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
        Schema::create('siswas', function (Blueprint $table) {
            $table->id();
            $table->foreignId('id_user')
                ->constrained('users')
                ->onDelete('cascade');
            $table->foreignId('id_kelas')
                ->constrained('kelas')
                ->onDelete('cascade');
            $table->string('nisn');
            $table->string('nama');
            $table->text('alamat');
            $table->enum('jeenis_kelamin', ['L','p']);
            $table->string('no_telepon');
            $table->string('foto');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('siswas');
    }
};
