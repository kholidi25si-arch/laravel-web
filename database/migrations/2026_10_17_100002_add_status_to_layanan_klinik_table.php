<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('layanan_klinik', function (Blueprint $table) {
            $table->enum('status', ['Tersedia', 'Tidak Tersedia'])->default('Tersedia')->after('durasi_menit');
        });
    }

    public function down(): void
    {
        Schema::table('layanan_klinik', function (Blueprint $table) {
            $table->dropColumn('status');
        });
    }
};
