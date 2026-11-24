<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('users', function (Blueprint $table) {
            // default 'mitra' agar user lama / user hasil Register tidak gagal (kolom NOT NULL)
            $table->string('role')->default('mitra')->after('password');
        });

        // User paling awal dijadikan Super Admin supaya halaman Data User tetap bisa diakses
        $firstUserId = DB::table('users')->min('id');
        if ($firstUserId) {
            DB::table('users')->where('id', $firstUserId)->update(['role' => 'Super Admin']);
        }
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn('role');
        });
    }
};
