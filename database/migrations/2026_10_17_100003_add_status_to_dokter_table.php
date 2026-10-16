<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('dokter', function (Blueprint $table) {
            $table->enum('status', ['Aktif', 'Nonaktif'])->default('Aktif')->after('no_hp');
        });
    }

    public function down(): void
    {
        Schema::table('dokter', function (Blueprint $table) {
            $table->dropColumn('status');
        });
    }
};
