<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMarksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('marks', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('admission_no')->nullable();
            $table->string('exam_no')->unique();
            $table->integer('mathematics');
            $table->integer('english');
            $table->integer('kiswahili');
            $table->integer('chemistry')->nullable();
            $table->integer('biology')->nullable();
            $table->integer('physics')->nullable();
            $table->integer('cre')->nullable();
            $table->integer('islam')->nullable();
            $table->integer('history')->nullable();
            $table->integer('ghc')->nullable();
            $table->foreignId('class_id')->nullable()->constrained()->onDelete('cascade');
            $table->foreignId('stream_id')->nullable()->constrained()->onDelete('cascade');
            $table->foreignId('exam_id')->nullable()->constrained()->onDelete('cascade');
            $table->foreignId('school_id')->nullable()->constrained()->onDelete('cascade');
            $table->foreignId('teacher_id')->nullable()->constrained()->onDelete('cascade');
            $table->foreignId('year_id')->nullable()->constrained()->onDelete('cascade');
            $table->foreignId('term_id')->nullable()->constrained()->onDelete('cascade');
            $table->foreignId('student_id')->nullable()->constrained()->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('marks');
    }
}
