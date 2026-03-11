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
        Schema::create('room_types', function (Blueprint $table) {
            $table->bigInteger('id', true);
            $table->string('name', 100);
            $table->text('description')->nullable();
            $table->decimal('price_per_night', 10);
            $table->integer('max_adults')->nullable()->default(2);
            $table->integer('max_children')->nullable()->default(0);
            $table->timestamp('created_at')->nullable()->useCurrent();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('room_types');
    }
};
