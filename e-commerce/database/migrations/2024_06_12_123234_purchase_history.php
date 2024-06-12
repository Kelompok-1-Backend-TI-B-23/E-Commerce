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
            $table->decimal('total_price', 15, 2); // masih belum yakin taruh dmn
        });

        Schema::create('transaction_details', function (Blueprint $table) {
            $table->foreignId('transaction_id')->primary(); // foreign key to purchase_history table
            $table->foreignId('product_id')->primary(); // foreign key ke table product
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
