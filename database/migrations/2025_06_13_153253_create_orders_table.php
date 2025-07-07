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
        Schema::create('orders', function (Blueprint $table) {
            $table->id(); // Primary key
            $table->string('id_order')->unique(); // Kode order unik (manual)
            $table->unsignedBigInteger('id_pelanggan')->nullable(); // Relasi ke tabel pelanggan (nullable untuk guest checkout)
            $table->decimal('total_price', 12, 2);
            $table->string('status')->default('pending');
            $table->string('alamat_pengiriman', 500);
            $table->string('no_resi')->nullable();
            $table->dateTime('tanggal_pesanan');
            $table->dateTime('tanggal_dikirim')->nullable();
            $table->string('metode_pembayaran');
            $table->timestamps();
            // Foreign key opsional (aktifkan jika tabel pelanggans tersedia)
            // $table->foreign('id_pelanggan')->references('id')->on('pelanggans')->onDelete('set null');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('orders');
    }
};
