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
        Schema::create('order_items', function (Blueprint $table) {
            $table->id(); // Primary key
            $table->string('id_order_item')->unique(); // ID manual item pesanan
            $table->unsignedBigInteger('id_order'); // Relasi ke tabel orders
            $table->unsignedBigInteger('id_produk'); // Relasi ke tabel produk
            $table->integer('quantity'); // Jumlah barang
            $table->decimal('harga', 10, 2); // Harga per item
            $table->timestamps();

            // Foreign key opsional (aktifkan jika tabel relasi tersedia)
            // $table->foreign('id_order')->references('id')->on('orders')->onDelete('cascade');
            // $table->foreign('id_produk')->references('id')->on('produks')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('order_items');
    }
};
