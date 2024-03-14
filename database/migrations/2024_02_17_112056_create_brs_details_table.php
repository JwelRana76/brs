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
        Schema::create('brs_details', function (Blueprint $table) {
            $table->id();
            $table->foreignId('brs_id')->constrained('brs')->onDelete('cascade');
            $table->longText('name')->nullable();
            $table->string('part')->nullable();
            $table->string('revenue')->nullable();
            $table->string('stain')->nullable();
            $table->string('plottype1')->nullable();
            $table->string('plottype2')->nullable();
            $table->string('amount1')->nullable();
            $table->string('amount2')->nullable();
            $table->string('khotian_amount')->nullable();
            $table->string('plot_amount1')->nullable();
            $table->string('plot_amount2')->nullable();
            $table->text('comment')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('brs_details');
    }
};
