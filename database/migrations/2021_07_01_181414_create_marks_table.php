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
            $table->integer('history_and_government')->nullable();
            $table->integer('geography')->nullable();
            $table->integer('home_science')->nullable();
            $table->integer('art_and_design')->nullable();
            $table->integer('agriculture')->nullable();
            $table->integer('business_studies')->nullable();
            $table->integer('computer_studies')->nullable();
            $table->integer('drawing_and_design')->nullable();
            $table->integer('french')->nullable();
            $table->integer('german')->nullable();
            $table->integer('arabic')->nullable();
            $table->integer('sign_language')->nullable();
            $table->integer('music')->nullable();
            $table->integer('wood_work')->nullable();
            $table->integer('metal_work')->nullable();
            $table->integer('building_construction')->nullable();
            $table->integer('power_mechanics')->nullable();
            $table->integer('electricity')->nullable();
            $table->integer('aviation_technology')->nullable();
            $table->foreignUuid('class_id')->constrained()->onDelete('cascade');
            $table->foreignUuid('stream_id')->constrained()->onDelete('cascade');
            $table->foreignUuid('exam_id')->constrained()->onDelete('cascade');
            $table->foreignUuid('school_id')->constrained()->onDelete('cascade');
            $table->foreignUuid('teacher_id')->constrained()->onDelete('cascade');
            $table->foreignUuid('year_id')->constrained()->onDelete('cascade');
            $table->foreignUuid('term_id')->constrained()->onDelete('cascade');
            $table->foreignUuid('student_id')->constrained()->onDelete('cascade');
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
