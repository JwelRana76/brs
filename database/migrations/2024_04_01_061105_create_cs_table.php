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
        Schema::create('cs', function (Blueprint $table) {
            $table->id();
            $table->string('unique_id')->unique();
            $table->string('resa_no');
            $table->foreignId('jlno_id')->constrained('jlnos')->onDelete('cascade');
            $table->string('khotian_no');
            $table->string('touja_no');
            $table->string('porogona');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('cs');
    }
};
