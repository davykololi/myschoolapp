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
            $table->string('first_name');
            $table->string('middle_name');
            $table->string('last_name');
            $table->string('title')->nullable();
            $table->string('image')->nullable();
            $table->string('phone_no')->nullable();
            $table->string('admission_no');
            $table->string('dob');
            $table->date('doa');
            $table->string('email')->unique();
            $table->string('password');
            $table->rememberToken();
            $table->string('postal_address')->nullable();
            $table->longText('history',2000);
            $table->foreignId('school_id')->constrained()->onDelete('cascade');
            $table->foreignId('stream_id')->constrained()->onDelete('cascade');
            $table->foreignId('intake_id')->constrained()->onDelete('cascade');
            $table->foreignId('dormitory_id')->constrained()->onDelete('cascade');
            $table->foreignId('admin_id')->constrained()->onDelete('cascade');
            $table->foreignId('parent_id')->constrained()->onDelete('cascade');
            $table->foreignId('position_student_id')->constrained()->onDelete('cascade');
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
