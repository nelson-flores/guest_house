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
        Schema::table('housekeeping', function (Blueprint $table) {
            $table->foreign(['room_id'], 'housekeeping_ibfk_1')->references(['id'])->on('rooms')->onUpdate('restrict')->onDelete('restrict');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('housekeeping', function (Blueprint $table) {
            $table->dropForeign('housekeeping_ibfk_1');
        });
    }
};
