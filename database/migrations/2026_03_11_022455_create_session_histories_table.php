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
        Schema::create('session_histories', function (Blueprint $table) {
            $table->bigInteger('id', true);
            $table->string('code', 191)->unique('code');
            $table->string('ip', 100)->nullable();
            $table->string('browser', 191)->nullable();
            $table->string('device', 191)->nullable();
            $table->string('user_agent', 191)->nullable();
            $table->string('sessionid', 191)->nullable();
            $table->float('latiutde')->nullable();
            $table->float('longitude')->nullable();
            $table->boolean('success')->default(false);
            $table->bigInteger('user_id')->index('user_id');
            $table->timestamp('created_at')->nullable()->useCurrent();
            $table->timestamp('updated_at')->useCurrentOnUpdate()->nullable();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('session_histories');
    }
};
