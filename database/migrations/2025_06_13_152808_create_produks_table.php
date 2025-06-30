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
        Schema::create('produks', function (Blueprint $table) {
            $table->id(); // ID auto-increment (primary key)
            $table->string('kode_produk')->unique(); // Kode unik produk (PRD001, PRD002, etc)
            $table->unsignedBigInteger('id_kategori'); // relasi ke kategori
            $table->string('nama_produk');
            $table->string('image_url');
            $table->text('deskripsi')->nullable();
            $table->decimal('harga', 10, 2);
            $table->integer('stock');
            $table->timestamps();

            // Foreign key ke tabel kategoris
            $table->foreign('id_kategori')->references('id')->on('kategoris')->onDelete('cascade');
        });
    }
    public function down(): void
    {
        Schema::dropIfExists('produks');
    }
};
