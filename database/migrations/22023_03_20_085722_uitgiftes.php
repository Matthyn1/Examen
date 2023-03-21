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
        //create table for issues given out from the company
        Schema::create('issue', function (Blueprint $table) {

            $table->id();
            $table->unsignedBigInteger('employee_ID');
            $table->unsignedBigInteger('part_ID');
            $table->datetime('Time');
            $table->float('PricePerKg');
            $table->float('StashKg');

            $table->foreign('employee_ID')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('part_ID')->references('id')->on('part')->onDelete('cascade');

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
        Schema::dropIfExists('issue');
    }
};
