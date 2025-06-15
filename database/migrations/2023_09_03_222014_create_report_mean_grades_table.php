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
        Schema::create('report_mean_grades', function (Blueprint $table) {
            $table->id();
            $table->string('grade');
            $table->string('grade_id')->unique();
            $table->float('points');
            $table->integer('from_mark');
            $table->integer('to_mark');
            $table->foreignUuid('year_id')->constrained()->onDelete('cascade');
            $table->foreignUuid('term_id')->constrained()->onDelete('cascade');
            $table->foreignUuid('class_id')->constrained()->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('report_mean_grades');
    }
};
