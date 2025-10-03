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
        Schema::create('compabilities', function (Blueprint $table) {
            // FK
            $table->foreignId('product_id')->constrained('products')
                    ->onDelete('cascade');
            $table->foreignId('compatible_product_id')->constrained('products')
                    ->onDelete('cascade');

            // PK
            $table->primary(['product_id', 'compatible_product_id']);

            // Demás campos
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('compabilities');
    }
};
