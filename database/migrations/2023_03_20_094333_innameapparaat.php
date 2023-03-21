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
        //create table for details of the taken-in device
        Schema::create('intakedevice', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('intake_ID');
            $table->unsignedBigInteger('device_ID');
            $table->boolean('taken apart');

            $table->foreign('intake_ID')->references('id')->on('intake')->onDelete('cascade');
            $table->foreign('device_ID')->references('id')->on('device')->onDelete('cascade');

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
        Schema::dropIfExists('intakedevice');
    }
};
