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
        Schema::create('addresses', function(Blueprint $table){
            // PK
            $table->id();

            // FK
            $table->foreignId('user_id')->constrained('users')
                    ->onDelete('cascade');
            
            // Demás Campos
            $table->string('street', 100);
            $table->string('number', 10);
            $table->string('city', 50);
            $table->string('country', 50);
            $table->string('postal_code', 10);
            $table->boolean('is_billing');
            $table->boolean('is_shipping');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('addresses');
    }
};
