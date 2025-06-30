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
            $table->id(); // Primary key
            $table->string('id_pembayaran')->unique(); // Kode pembayaran unik (manual)
            $table->unsignedBigInteger('id_order'); // Relasi ke tabel orders
            $table->string('payment_method'); // Contoh: transfer bank, e-wallet, dll
            $table->enum('payment_status', ['pending', 'berhasil', 'gagal'])->default('pending');
            $table->dateTime('payment_date')->nullable(); // Tanggal & waktu pembayaran
            $table->timestamps();

            // Foreign key opsional (aktifkan jika tabel orders tersedia)
            // $table->foreign('id_order')->references('id')->on('orders')->onDelete('cascade');
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
