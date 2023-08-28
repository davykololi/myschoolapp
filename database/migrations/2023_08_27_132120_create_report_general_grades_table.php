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
        Schema::create('report_general_grades', function (Blueprint $table) {
            $table->id();
            $table->string('grade');
            $table->string('grade_no')->unique();
            $table->float('points');
            $table->integer('from_mark');
            $table->integer('to_mark');
            $table->bigInteger('year_id')->unsigned();
            $table->foreign('year_id')->references('id')->on('years')->onDelete('cascade');
            $table->bigInteger('term_id')->unsigned();
            $table->foreign('term_id')->references('id')->on('terms')->onDelete('cascade');
            $table->bigInteger('class_id')->unsigned();
            $table->foreign('class_id')->references('id')->on('classes')->onDelete('cascade');
            $table->bigInteger('exam_id')->unsigned();
            $table->foreign('exam_id')->references('id')->on('exams')->onDelete('cascade');
            $table->bigInteger('teacher_id')->unsigned();
            $table->foreign('teacher_id')->references('id')->on('teachers')->onDelete('cascade');
            $table->bigInteger('subject_id')->unsigned()->nullable();
            $table->foreign('subject_id')->references('id')->on('subjects')->onDelete('cascade');
            $table->bigInteger('school_id')->unsigned()->nullable();
            $table->foreign('school_id')->references('id')->on('schools')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('report_general_grades');
    }
};
