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
        Schema::create('rooms', function (Blueprint $table) {
            $table->bigInteger('id', true);
            $table->string('room_number', 20)->unique('room_number');
            $table->bigInteger('room_type_id')->index('room_type_id');
            $table->integer('floor')->nullable();
            $table->enum('status', ['available', 'occupied', 'maintenance'])->nullable()->default('available');
            $table->timestamp('created_at')->nullable()->useCurrent();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('rooms');
    }
};
