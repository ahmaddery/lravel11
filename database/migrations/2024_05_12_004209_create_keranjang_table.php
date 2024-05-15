<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('keranjang', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('user_id'); // Menambahkan kolom user_id
            $table->unsignedBigInteger('product_id');
            $table->integer('quantity');
            $table->timestamp('created_at')->nullable();
            $table->timestamp('updated_at')->nullable();
            $table->foreign('user_id')->references('id')->on('users'); // Menambahkan foreign key untuk user_id
            $table->foreign('product_id')->references('id')->on('products');
            $table->index('product_id'); // Tambahkan indeks untuk kueri yang lebih cepat jika diperlukan
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('keranjang');
    }
};
