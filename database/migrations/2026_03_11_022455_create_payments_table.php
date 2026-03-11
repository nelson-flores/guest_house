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
        Schema::create('payments', function (Blueprint $table) {
            $table->bigInteger('id', true);
            $table->bigInteger('reservation_id')->index('reservation_id');
            $table->decimal('amount', 10);
            $table->enum('method', ['cash', 'card', 'mpesa', 'emola', 'mkesh', 'bank_transfer'])->nullable();
            $table->enum('status', ['pending', 'paid', 'failed'])->nullable()->default('pending');
            $table->string('transaction_reference', 191)->nullable();
            $table->timestamp('created_at')->nullable()->useCurrent();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('payments');
    }
};
