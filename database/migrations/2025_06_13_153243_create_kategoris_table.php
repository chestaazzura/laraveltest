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
        Schema::create('kategoris', function (Blueprint $table) {
            $table->id(); // Primary key: id
            $table->string('id_kategori')->unique(); // ID kategori manual (unik)
            $table->string('nama_kategori');
            $table->text('deskripsi')->nullable();
            $table->string('image_url')->nullable(); // URL gambar kategori
            $table->timestamps(); // created_at & updated_at
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('kategoris');
    }
};
