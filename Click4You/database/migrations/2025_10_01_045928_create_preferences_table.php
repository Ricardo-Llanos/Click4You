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
        Schema::create('preferences', function(Blueprint $table){
            // FK
            $table->foreignId('user_id')->constrained('users')
                    ->onDelete('cascade');

            // PK
            $table->primary('user_id');

            // Demás campos
            $table->char('currency', 3);
            $table->char('language_code', 2);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('preferences');
    }
};
