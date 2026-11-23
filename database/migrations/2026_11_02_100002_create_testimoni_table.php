<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('testimoni', function (Blueprint $table) {
            $table->increments('testimoni_id');
            $table->unsignedInteger('layanan_id');
            $table->string('nama_pengirim', 100);
            $table->text('isi');
            $table->unsignedTinyInteger('rating')->default(5);
            $table->enum('status', ['Tampil', 'Sembunyi'])->default('Tampil');
            $table->timestamps();

            $table->foreign('layanan_id')
                ->references('layanan_id')->on('layanan_klinik')
                ->cascadeOnDelete();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('testimoni');
    }
};
