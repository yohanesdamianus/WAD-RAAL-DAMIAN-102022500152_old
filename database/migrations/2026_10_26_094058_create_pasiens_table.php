<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('pasiens', function (Blueprint $table) {
            $table->id();
            $table->string('rekam_medis')->unique();
            $table->string('nama_pasien');
            $table->text('domisili');
            $table->string('kontak_darurat');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('pasiens');
    }
};
