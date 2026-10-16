<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('layanan_klinik', function (Blueprint $table) {
            $table->increments('layanan_id');
            $table->string('nama_layanan', 100);
            $table->text('deskripsi')->nullable();
            $table->unsignedInteger('harga');
            $table->unsignedSmallInteger('durasi_menit');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('layanan_klinik');
    }
};
