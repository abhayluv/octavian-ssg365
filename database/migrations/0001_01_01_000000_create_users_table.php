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
            $table->bigInteger('u_id')->comment('unique id');
            $table->tinyInteger('role')->comment('1-master admin, 2-admin, 3-officer, 4-client');
            $table->tinyInteger('steps')->comment('1-email, 2-user details, 3-pin, 4-document approved');
            $table->tinyInteger('status')->default('1')->comment('1-active, 0-disable');
            $table->text('verification_code')->nullable();
            $table->string('name');
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->rememberToken();
            $table->string('phone');
            $table->date('dob')->nullable();
            $table->tinyInteger('gender')->default('1')->comment('1-male, 2-female, 3-other');
            $table->text('country');
            $table->text('address');
            $table->tinyInteger('incorrect_attempt')->nullable()->comment('max 3 attempt, on 3rd attempt redirect to forget pin');
            $table->longText('language')->nullable()->comment('json object of language');
            $table->timestamps();

            $table->index(['u_id', 'name']);
        });

        Schema::create('password_reset_tokens', function (Blueprint $table) {
            $table->string('email')->primary();
            $table->string('token');
            $table->timestamp('created_at')->nullable();
        });

        Schema::create('sessions', function (Blueprint $table) {
            $table->string('id')->primary();
            $table->foreignId('user_id')->nullable()->index();
            $table->string('ip_address', 45)->nullable();
            $table->text('user_agent')->nullable();
            $table->longText('payload');
            $table->integer('last_activity')->index();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
        Schema::dropIfExists('password_reset_tokens');
        Schema::dropIfExists('sessions');
    }
};
