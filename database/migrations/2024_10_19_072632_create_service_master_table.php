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
        Schema::create('service_master', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('ser_id');
            $table->text('name');
            $table->text('image');
            $table->tinyInteger('status')->comment('0 = Disable, 1 = Active');
            $table->timestamps();
            $table->softDeletes();

            $table->index(['ser_id', 'name']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('service_master');
    }
};
