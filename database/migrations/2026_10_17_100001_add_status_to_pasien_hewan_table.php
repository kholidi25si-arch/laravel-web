<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('pasien_hewan', function (Blueprint $table) {
            $table->enum('status', ['Rawat Jalan', 'Rawat Inap'])->default('Rawat Jalan')->after('no_hp_pemilik');
        });
    }

    public function down(): void
    {
        Schema::table('pasien_hewan', function (Blueprint $table) {
            $table->dropColumn('status');
        });
    }
};
