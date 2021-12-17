<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStudentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('students', function (Blueprint $table) {
            $table->id();
            $table->string('title')->nullable();
            $table->string('name');
            $table->string('image')->nullable();
            $table->string('adm_mark')->default('350');
            $table->string('phone_no')->nullable();
            $table->string('admission_no');
            $table->string('dob');
            $table->date('doa');
            $table->string('email')->unique();
            $table->string('gender')->nullable();
            $table->string('password');
            $table->rememberToken();
            $table->string('address')->nullable();
            $table->longText('history',2000);
            $table->foreignId('school_id')->constrained()->onDelete('cascade');
            $table->bigInteger('bg_id')->unsigned();
            $table->foreign('bg_id')->references('id')->on('blood_groups');
            $table->foreignId('stream_id')->constrained();
            $table->foreignId('intake_id')->constrained();
            $table->foreignId('dormitory_id')->constrained();
            $table->foreignId('admin_id')->constrained();
            $table->foreignId('parent_id')->constrained();
            $table->foreignId('position_student_id')->constrained();
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
        Schema::dropIfExists('students');
    }
}
