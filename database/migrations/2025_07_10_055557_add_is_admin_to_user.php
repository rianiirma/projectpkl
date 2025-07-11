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
        Schema::table('users', callback: function (Blueprint $table): void {
            $table->boolean(column: 'is_admin')->default(value: false)->after(colum: 'role');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('users', callback: function (Blueprint $table): void {
            $table->dropColumn(colomns: 'is_admin');
        });
    }
};
