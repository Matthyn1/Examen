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
        //Create table for the intakes from customers by employees
        Schema::create('intake', function (Blueprint $table) {

            $table->id();
            $table->unsignedBigInteger('employee_ID');
            $table->datetime('time');

            $table->foreign('employee_ID')->references('id')->on('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
        Schema::dropIfExists('intake');
    }
};
