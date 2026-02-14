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
        Schema::create('cars', function (Blueprint $table) {
            $table->id();
            $table->string('title'); // e.g., "2016 Lexus RX200t"
            $table->string('make'); // Brand: Toyota, Honda, Lexus, etc.
            $table->string('model'); // RX200t, Camry, Accord
            $table->integer('year');
            $table->decimal('price', 10, 2);
            $table->string('condition'); // New, Used, Certified Pre-Owned
            $table->integer('mileage')->nullable();
            $table->string('transmission'); // Automatic, Manual
            $table->string('fuel_type'); // Petrol, Diesel, Electric, Hybrid
            $table->string('body_type'); // SUV, Sedan, Coupe, Truck, etc.
            $table->string('exterior_color');
            $table->string('interior_color')->nullable();
            $table->integer('doors')->nullable();
            $table->integer('seats')->nullable();
            $table->string('engine_size')->nullable(); // e.g., "2.0L"
            $table->text('description');
            $table->string('vin')->unique()->nullable(); // Vehicle Identification Number
            $table->string('location'); // City/State
            $table->string('status')->default('available'); // available, sold, pending
            $table->boolean('is_featured')->default(false);
            $table->integer('views')->default(0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('cars');
    }
};
