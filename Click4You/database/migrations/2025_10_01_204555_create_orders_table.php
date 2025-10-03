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
        Schema::create('orders', function (Blueprint $table) {
            // PK
            $table->id();

            // FK
            $table->foreignId('user_id')->constrained('users')
                    ->onDelete('cascade');

            $table->foreignId('shipment_id')->constrained('shipments')
                    ->onDelete('cascade');

            $table->foreignId('address_id')->constrained('addresses')
                    ->onDelete('cascade');

            // Demás campos
            $table->bigInteger('orden');
            $table->string('state', 20);
            $table->decimal('total_price', 8, 2);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('orders');
    }
};
