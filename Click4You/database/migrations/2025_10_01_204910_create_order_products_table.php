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
        Schema::create('order_products', function (Blueprint $table) {
            // FK
            $table->foreignId('order_id')->constrained('orders')
                    ->onDelete('cascade');

            $table->foreignId('product_id')->constrained('products')
                    ->onDelete('cascade');

            // PK
            $table->primary(['order_id', 'product_id']);

            // Demás camp
            $table->string('product_name', 200);
            $table->integer('quantity');
            $table->decimal('unit_price', 8, 2); // 100000,00
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('order_products');
    }
};
