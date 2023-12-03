<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRecordsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('records', function (Blueprint $table) {
            $table->id();
            $table->string('desc');
            $table->longText('content');
            $table->bigInteger('student_id')->unsigned()->nullable();
            $table->foreign('student_id')->references('id')->on('students')->onDelete('cascade');
            $table->bigInteger('school_id')->unsigned()->nullable();
            $table->foreign('school_id')->references('id')->on('schools')->onDelete('cascade');
            $table->bigInteger('stream_id')->unsigned()->nullable();
            $table->foreign('stream_id')->references('id')->on('streams')->onDelete('cascade');
            $table->bigInteger('department_id')->unsigned()->nullable();
            $table->foreign('department_id')->references('id')->on('departments')->onDelete('cascade');
            $table->bigInteger('teacher_id')->unsigned()->nullable();
            $table->foreign('teacher_id')->references('id')->on('teachers')->onDelete('cascade');
            $table->bigInteger('staff_id')->unsigned()->nullable();
            $table->foreign('staff_id')->references('id')->on('staffs')->onDelete('cascade');
            $table->bigInteger('librarian_id')->unsigned()->nullable();
            $table->foreign('librarian_id')->references('id')->on('librarians')->onDelete('cascade');
            $table->bigInteger('matron_id')->unsigned()->nullable();
            $table->foreign('matron_id')->references('id')->on('matrons')->onDelete('cascade');
            $table->bigInteger('accountant_id')->unsigned()->nullable();
            $table->foreign('accountant_id')->references('id')->on('accountants')->onDelete('cascade');
            $table->bigInteger('admin_id')->unsigned()->nullable();
            $table->foreign('admin_id')->references('id')->on('admins')->onDelete('cascade');
            $table->bigInteger('class_id')->unsigned()->nullable();
            $table->foreign('class_id')->references('id')->on('classes')->onDelete('cascade');
            $table->bigInteger('dormitory_id')->unsigned()->nullable();
            $table->foreign('dormitory_id')->references('id')->on('dormitories')->onDelete('cascade');
            $table->bigInteger('intake_id')->unsigned()->nullable();
            $table->foreign('intake_id')->references('id')->on('intakes')->onDelete('cascade');
            $table->bigInteger('subject_id')->unsigned()->nullable();
            $table->foreign('subject_id')->references('id')->on('subjects')->onDelete('cascade');
            $table->bigInteger('event_id')->unsigned()->nullable();
            $table->foreign('event_id')->references('id')->on('events')->onDelete('cascade');
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
        Schema::dropIfExists('records');
    }
}
