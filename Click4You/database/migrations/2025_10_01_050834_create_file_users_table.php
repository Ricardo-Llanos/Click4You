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
        Schema::create('file_users', function (Blueprint $table) {
            // PK
            $table->id();

            // FK
            $table->foreignId('user_id')->constrained('users')
                    ->onDelete('cascade');

            // Demás campos
            $table->string('path', 200);
            $table->string('filename', 100);
            $table->bigInteger('size');
            $table->string('type', 20);
            $table->timestamps();

            $table->unique('path');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('file_users');
    }
};
