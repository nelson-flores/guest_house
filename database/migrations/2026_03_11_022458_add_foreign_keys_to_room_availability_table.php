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
        Schema::table('room_availability', function (Blueprint $table) {
            $table->foreign(['room_id'], 'room_availability_ibfk_1')->references(['id'])->on('rooms')->onUpdate('restrict')->onDelete('restrict');
            $table->foreign(['reservation_id'], 'room_availability_ibfk_2')->references(['id'])->on('reservations')->onUpdate('restrict')->onDelete('restrict');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('room_availability', function (Blueprint $table) {
            $table->dropForeign('room_availability_ibfk_1');
            $table->dropForeign('room_availability_ibfk_2');
        });
    }
};
