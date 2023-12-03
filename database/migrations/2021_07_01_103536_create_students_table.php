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
            $table->string('salutation')->nullable();
            $table->string('first_name');
            $table->string('middle_name');
            $table->string('last_name');
            $table->string('image')->nullable();
            $table->string('gender')->nullable();
            $table->string('email')->unique()->nullable();
            $table->string('blood_group')->default('A');
            $table->string('adm_mark')->default('350');
            $table->string('admission_no');
            $table->string('phone_no')->nullable();
            $table->string('dob');
            $table->string('doa');
            $table->string('role')->default('ordinarystudent');
            $table->rememberToken();
            $table->tinyInteger('active')->default(1);
            $table->foreignId('school_id')->constrained()->onDelete('cascade');
            $table->foreignId('stream_id')->constrained();
            $table->foreignId('intake_id')->constrained();
            $table->foreignId('dormitory_id')->constrained();
            $table->foreignId('admin_id')->constrained();
            $table->foreignId('parent_id')->constrained();
            $table->string('password');
            $table->boolean('is_banned')->default(false);
            $table->string('lock')->default('enabled');
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
