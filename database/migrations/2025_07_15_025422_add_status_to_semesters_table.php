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
        Schema::table('semesters', function (Blueprint $table) {
            $table->enum('status', ['aktif', 'tidak_aktif'])->default('tidak_aktif');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('semesters', function (Blueprint $table) {
            //
        });
    }
};
