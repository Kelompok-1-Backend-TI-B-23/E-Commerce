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
        Schema::create('purchase_history', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained('users')->index();
            // $table->string('transaction_id')->unique()->primary();
            $table->timestamp('transaction_date');
            $table->decimal('ship_fee', 15, 2);
            $table->decimal('total_price', 15, 2);
            $table->timestamps();
        });

        Schema::create('transaction_details', function (Blueprint $table) {
            $table->unsignedBigInteger('product_id');
            $table->unsignedBigInteger('purchase_history_id');
            $table->integer('quantity');
            $table->foreign('product_id')->references('id')->on('products')->onDelete('cascade');
            $table->foreign('purchase_history_id')->references('id')->on('purchase_history')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('purchase_history');
        Schema::dropIfExists('transaction_details');
    }
};
