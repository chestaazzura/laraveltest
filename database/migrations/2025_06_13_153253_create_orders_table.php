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
            $table->id(); // ID auto increment (primary key)
            $table->string('id_order')->unique(); // Kode unik pesanan (contoh: ORD001)
            $table->unsignedBigInteger('id_pelanggan'); // FK ke tabel pelanggan (opsional)
            $table->decimal('total_price', 10, 2); // Total harga pesanan
            $table->enum('status', ['pending', 'dibayar', 'dikirim', 'selesai', 'batal'])->default('pending'); // Status pesanan
            $table->timestamps();

            // Foreign key ke tabel pelanggans
            $table->foreign('id_pelanggan')->references('id')->on('pelanggans')->onDelete('cascade');
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
