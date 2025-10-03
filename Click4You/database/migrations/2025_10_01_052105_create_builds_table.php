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
        Schema::create('builds', function (Blueprint $table) {
            // PK
            $table->id();
            
            // FK
            $table->foreignId('user_id')->constrained('users')
                    ->onDelete('cascade');

            // Demás campos
            $table->string('name', 50);
            $table->boolean('is_complete');
            $table->timestamps();

            // Constraints
            $table->unique('name');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('builds');
    }
};
