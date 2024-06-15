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
            $table->foreignId('user_id')->index();
            $table->string('transaction_id')->unique()->primary();
            $table->timestamp('transaction_date');
            $table->decimal('ship_fee', 15, 2);
            $table->decimal('total_price', 15, 2); 
        });

        Schema::create('transaction_details', function (Blueprint $table) {
            $table->foreignId('transaction_id')->primary(); // foreign key ke table purchase_history
            $table->foreignId('product_id'); // foreign key ke table product
            $table->integer('quantity');
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
