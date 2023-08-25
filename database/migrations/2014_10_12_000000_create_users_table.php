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
            $table->id();
            $table->string('name')->unique();
            $table->string('email')->unique();
            $table->string('password');
            $table->timestamps();
            $table->rememberToken();

            $table->string('wallet')->nullable();

            $table->bigInteger('level');
            $table->bigInteger('experience');
            $table->bigInteger('points');
            $table->bigInteger('coin');
            $table->bigInteger('energy');
            $table->bigInteger('energy_limit');

            $table->dateTime('travel_start_at');
            $table->dateTime('energy_collect_at');
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
