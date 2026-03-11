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
        Schema::create('users', function (Blueprint $table) {
            $table->bigInteger('id', true);
            $table->string('code', 191)->unique('code');
            $table->string('profile_picture', 191)->nullable();
            $table->string('name', 191)->nullable();
            $table->string('last_name', 191)->nullable();
            $table->string('password', 80)->nullable();
            $table->boolean('active')->default(true);
            $table->bigInteger('city_id')->nullable()->index('city_id');
            $table->string('phone', 20)->nullable();
            $table->string('email', 150)->nullable();
            $table->string('national_id', 150)->nullable();
            $table->string('activation_token', 100)->nullable();
            $table->rememberToken();
            $table->string('otp', 100)->nullable();
            $table->bigInteger('gender_id')->nullable()->index('gender_id');
            $table->bigInteger('role_id')->nullable()->index('role_id');
            $table->string('type', 100)->default('user')->comment('user,admin');
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
        Schema::dropIfExists('users');
    }
};
