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
        Schema::table('operation_histories', function (Blueprint $table) {
            $table->foreign(['user_id'], 'operation_histories_ibfk_1')->references(['id'])->on('users')->onUpdate('restrict')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('operation_histories', function (Blueprint $table) {
            $table->dropForeign('operation_histories_ibfk_1');
        });
    }
};
