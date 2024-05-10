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
        Schema::create('land_details', function (Blueprint $table) {
            $table->id();
            $table->foreignId('khajna_id')->constrained('khajnas')->onDelete('cascade');
            $table->string('dag_no');
            $table->string('land_type');
            $table->string('land_qty');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('land_details');
    }
};
