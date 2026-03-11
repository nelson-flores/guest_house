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
        Schema::create('options', function (Blueprint $table) {
            $table->bigInteger('id', true);
            $table->string('name', 400);
            $table->string('code', 300)->unique('code');
            $table->longText('content')->nullable();
            $table->enum('content_type', ['plain_text', 'rich_text', 'number'])->nullable()->default('rich_text');
            $table->boolean('active')->default(true);
            $table->boolean('multiple')->default(false);
            $table->bigInteger('parent_id')->nullable();
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
        Schema::dropIfExists('options');
    }
};
