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
        Schema::create('berkas_siswas', function (Blueprint $table) {
            $table->id();
            $table->integer('siswa_id');
            $table->string('skl')->nullable();
            $table->string('ijazah_sd')->nullable();
            $table->string('ijazah_smp')->nullable();
            $table->string('pasfoto')->nullable();
            $table->string('kk')->nullable();
            $table->string('akte')->nullable();
            $table->string('lainnya')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('berkas_siswas');
    }
};
