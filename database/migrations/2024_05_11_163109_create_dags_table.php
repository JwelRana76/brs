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
        Schema::create('dags', function (Blueprint $table) {
            $table->id();
            $table->foreignId('mouja_id')->constrained('Moujas')->onDelete('cascade');
            $table->string('cs_dag');
            $table->string('cs_land_type')->nullable();
            $table->string('cs_khotian')->nullable();
            $table->string('cs_land_qty')->nullable();
            $table->string('cs_mouja_sheet_no')->nullable();
            $table->string('sa_dag');
            $table->string('sa_land_type')->nullable();
            $table->string('sa_khotian')->nullable();
            $table->string('sa_land_qty')->nullable();
            $table->string('sa_mouja_sheet_no')->nullable();
            $table->string('brs_dag');
            $table->string('brs_land_type')->nullable();
            $table->string('brs_khotian')->nullable();
            $table->string('brs_land_qty')->nullable();
            $table->string('brs_mouja_sheet_no')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('dags');
    }
};
