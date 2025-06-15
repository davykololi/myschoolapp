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
            $table->uuid('id')->primary();
            $table->string('image')->nullable();
            $table->string('gender');
            $table->string('blood_group')->default('A');
            $table->string('adm_mark')->default('350');
            $table->string('admission_no')->unique();
            $table->string('phone_no')->nullable();
            $table->string('dob');
            $table->string('doa');
            $table->string('position')->default('Ordinary Student');
            $table->tinyInteger('active')->default(1);
            $table->foreignUuid('user_id')->constrained()->onDelete('cascade');
            $table->foreignUuid('stream_id')->constrained();
            $table->foreignUuid('intake_id')->constrained();
            $table->foreignUuid('dormitory_id')->constrained();
            $table->foreignUuid('admin_id')->constrained()->onDelete('cascade');
            $table->foreignUuid('parent_id')->constrained()->onDelete('cascade');
            $table->foreignUuid('school_id')->constrained()->onDelete('cascade');
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
