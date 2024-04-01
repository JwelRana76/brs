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
        Schema::create('cs_details', function (Blueprint $table) {
            $table->id();
            $table->foreignId('cs_id')->constrained('cs')->onDelete('cascade');
            $table->string('one')->nullable();
            $table->string('two')->nullable();
            $table->string('three')->nullable();
            $table->string('four')->nullable();
            $table->string('five')->nullable();
            $table->string('six')->nullable();
            $table->string('seven')->nullable();
            $table->string('eight')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('cs_details');
    }
};
