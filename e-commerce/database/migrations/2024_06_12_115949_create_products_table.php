<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('category');
            $table->text('description')->nullable();
            $table->decimal('price', 8, 2);
            $table->integer('stock')->default(0);
            $table->integer('times_bought')->default(0);
            $table->string('image_url')->nullable();
            // $table->unsignedBigInteger('category_id');
            $table->timestamps();

            // // Relasi dengan tabel categories
            // $table->foreign('category_id')->references('id')->on('categories')->onDelete('cascade');  // Table name should be 'categories'
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('products');
    }
}