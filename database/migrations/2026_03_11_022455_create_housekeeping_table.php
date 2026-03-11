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
        Schema::create('housekeeping', function (Blueprint $table) {
            $table->bigInteger('id', true);
            $table->bigInteger('room_id')->index('room_id');
            $table->string('cleaned_by', 100)->nullable();
            $table->timestamp('cleaned_at')->nullable();
            $table->text('notes')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('housekeeping');
    }
};
