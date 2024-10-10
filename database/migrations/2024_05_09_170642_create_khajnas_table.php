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
        Schema::create('khajnas', function (Blueprint $table) {
            $table->id();
            $table->string('sl_no');
            $table->string('office_name');
            $table->string('mouja_no');
            $table->string('holding_no');
            $table->string('khotian_no');
            $table->string('beforethreeYearDue')->default(0);
            $table->string('threeYearDue')->default(0);
            $table->string('due_interest')->default(0);
            $table->string('haldabi')->default(0);
            $table->string('totaldabi')->default(0);
            $table->string('totalcollect')->default(0);
            $table->string('totaldue')->default(0);
            $table->text('comment')->nullable;
            $table->foreignId('district_id')->constrained('districts')->onDelete('cascade');
            $table->foreignId('upazila_id')->constrained('upazilas')->onDelete('cascade');
            $table->integer('user_id')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('khajnas');
    }
};
