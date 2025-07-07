<?php
// database/migrations/xxxx_xx_xx_create_pembayarans_table.php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('pembayarans', function (Blueprint $table) {
            $table->id();
            $table->string('id_pembayaran')->unique();
            $table->unsignedBigInteger('id_order');
            $table->string('payment_method');
            $table->enum('payment_status', ['pending', 'berhasil', 'gagal'])->default('pending');
            $table->dateTime('payment_date')->nullable();
            $table->timestamps();
            $table->foreign('id_order')->references('id')->on('orders')->onDelete('cascade');
        });
    }
    public function down(): void
    {
        Schema::dropIfExists('pembayarans');
    }
};
