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
        Schema::create('sa_details_twos', function (Blueprint $table) {
            $table->id();
            $table->foreignId('sa_id')->constrained('sas')->onDelete('cascade');
            $table->string('one')->nullable();
            $table->string('two')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('sa_details_twos');
    }
};
