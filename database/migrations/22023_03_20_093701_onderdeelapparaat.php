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
        //Create table for parts of devices
        Schema::create('partdevice', function (Blueprint $table) {

            $table->id();
            $table->unsignedBigInteger('part_ID');
            $table->unsignedBigInteger('device_ID');
            $table->integer('percentage')->nullable();

            $table->foreign('part_ID')->references('id')->on('parts')->onDelete('cascade');
            $table->foreign('device_ID')->references('id')->on('device')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
        Schema::dropIfExists('partdevice');
    }
};
