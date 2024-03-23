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
            $table->string('image')->nullable();
            $table->string('gender')->nullable();
            $table->string('blood_group')->default('A');
            $table->string('adm_mark')->default('350');
            $table->string('admission_no');
            $table->string('phone_no')->nullable();
            $table->string('dob');
            $table->string('doa');
            $table->string('position')->default('Ordinary Student');
            $table->tinyInteger('active')->default(1);
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            $table->foreignId('stream_id')->constrained();
            $table->foreignId('intake_id')->constrained();
            $table->foreignId('dormitory_id')->constrained();
            $table->bigInteger('admin_id')->unsigned();
            $table->foreign('admin_id')->references('id')->on('admins')->onDelete('cascade');
            $table->bigInteger('parent_id')->unsigned();
            $table->foreign('parent_id')->references('id')->on('parents')->onDelete('cascade');
            $table->foreignId('school_id')->constrained()->onDelete('cascade');
            $table->boolean('is_banned')->default(false);
            $table->boolean('payment_locked')->default(true);
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
