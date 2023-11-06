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
        Schema::create('cars', function (Blueprint $table) {
            $table->id();
            $table->string('company');
            $table->foreignId('user_id')->nullable()->constrained()->onDelete('cascade');
            $table->string('model');
            $table->integer('mileage');
            $table->integer('price');
            $table->integer('year');
            $table->string('color');
            $table->string('engine');
            $table->string('gearbox');
            $table->string('fuel');
            $table->string('location');
            $table->string('feauters')->nullable();
            $table->string('description')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('cars');
    }
};
