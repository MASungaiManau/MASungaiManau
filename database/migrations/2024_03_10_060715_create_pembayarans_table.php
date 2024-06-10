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
        Schema::create('pembayarans', function (Blueprint $table) {
            $table->id();
            $table->integer('siswa_id');
            $table->string('kode_transaksi');
            $table->string('jumlah_bayar');
            $table->date('tanggal');
            $table->enum('status', ['Diverifikasi', 'Belum Verifikasi']);
            $table->enum('bayar_via', ['Online', 'Offline']);
            $table->string('bukti');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pembayarans');
    }
};
