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
        Schema::create('operation_histories', function (Blueprint $table) {
            $table->bigInteger('id', true);
            $table->bigInteger('user_id')->index('user_id');
            $table->string('code', 190)->nullable();
            $table->text('description')->nullable();
            $table->string('classmethod', 400)->nullable();
            $table->text('old_serialized_object')->nullable();
            $table->text('current_serialized_object')->nullable();
            $table->string('object_table', 190)->nullable();
            $table->string('sessionid', 190)->nullable();
            $table->bigInteger('module_id')->nullable();
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
        Schema::dropIfExists('operation_histories');
    }
};
