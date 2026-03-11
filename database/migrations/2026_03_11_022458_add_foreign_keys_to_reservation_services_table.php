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
        Schema::table('reservation_services', function (Blueprint $table) {
            $table->foreign(['reservation_id'], 'reservation_services_ibfk_1')->references(['id'])->on('reservations')->onUpdate('restrict')->onDelete('restrict');
            $table->foreign(['service_id'], 'reservation_services_ibfk_2')->references(['id'])->on('services')->onUpdate('restrict')->onDelete('restrict');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('reservation_services', function (Blueprint $table) {
            $table->dropForeign('reservation_services_ibfk_1');
            $table->dropForeign('reservation_services_ibfk_2');
        });
    }
};
