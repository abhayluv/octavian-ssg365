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
        Schema::create('ap_sessions', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('u_id')->comment('users table u_id');
            $table->text('device_token');
            $table->text('pin');
            $table->timestamps();

            $table->index(['u_id']);

            //$table->foreign('u_id')->references('u_id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('ap_sessions');
    }
};
