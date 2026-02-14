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
        Schema::create('guest_actions', function (Blueprint $table) {
            $table->id();
            $table->string('session_id'); // Track by session
            $table->foreignId('car_id')->constrained()->onDelete('cascade');
            $table->string('action_type'); // view, inquiry, favorite
            $table->ipAddress('ip_address')->nullable();
            $table->timestamps();

            $table->index(['session_id', 'car_id']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('guest_actions');
    }
};
