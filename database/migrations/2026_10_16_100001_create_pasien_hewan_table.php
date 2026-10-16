<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('pasien_hewan', function (Blueprint $table) {
            $table->increments('pasien_id');
            $table->string('nama_hewan', 100);
            $table->string('jenis_hewan', 50);
            $table->string('ras', 100)->nullable();
            $table->enum('jenis_kelamin', ['Jantan', 'Betina']);
            $table->date('tanggal_lahir')->nullable();
            $table->string('nama_pemilik', 100);
            $table->string('no_hp_pemilik', 20);
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('pasien_hewan');
    }
};
