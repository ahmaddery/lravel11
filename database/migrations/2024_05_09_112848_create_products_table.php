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
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->string('nama_product');
            $table->string('harga')->nullable();
            $table->text('deskripsi');
            $table->integer('rating')->nullable();
            $table->string('foto')->nullable();
            $table->string('foto1')->nullable(); 
            $table->string('foto2')->nullable(); 
            $table->string('foto3')->nullable(); 
            $table->string('foto4')->nullable();  
            $table->timestamps();
        });
    }
    

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('products');
    }
};
