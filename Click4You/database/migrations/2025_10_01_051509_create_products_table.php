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
        Schema::create('products', function (Blueprint $table) {
            // PK
            $table->id();

            // FK
            $table->foreignId('categorie_id')->constrained('categories')
                    ->onDelete('cascade');
            
            // Demás campos
            $table->string('names', 100);
            $table->text('description')->nullable();
            $table->decimal('price', 8, 2); // 100000,02
            $table->string('brand', 50);
            $table->integer('quantity');
            $table->boolean('is_active')->default(true);
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
