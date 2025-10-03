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
        Schema::create('discount_products', function (Blueprint $table) {
            // FK
            $table->foreignId('discount_id')->constrained('discounts')
                    ->onDelete('cascade');
            $table->foreignId('product_id')->constrained('products')
                    ->onDelete('cascade');

            // PK
            $table->primary(['discount_id', 'product_id']);

            // Demás campos
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('discount_products');
    }
};
