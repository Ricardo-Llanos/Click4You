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
        Schema::create('shopping_carts', function (Blueprint $table) {
            // FK
            $table->foreignId('user_id')->constrained('users')
                    ->onDelete('cascade');
            
            $table->foreignId('product_id')->constrained('products')
                    ->onDelete('cascade');

            // PK (Compuesta)
            $table->primary(['user_id', 'product_id']);

            // Demás campos
            $table->integer('quantity');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('shopping_carts');
    }
};
