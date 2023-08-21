<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTeachersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('teachers', function (Blueprint $table) {
            $table->id();
            $table->string('salutation')->nullable();
            $table->string('first_name');
            $table->string('middle_name');
            $table->string('last_name');
            $table->string('image')->nullable();
            $table->string('emp_no')->nullable();
            $table->string('email')->unique();
            $table->string('gender')->nullable();
            $table->string('password');
            $table->rememberToken();
            $table->string('id_no');
            $table->string('dob');
            $table->string('designation');
            $table->string('address')->nullable();
            $table->string('phone_no')->nullable();
            $table->string('role')->default('staffteacher');
            $table->longText('history',2000);
            $table->foreignId('school_id')->constrained()->onDelete('cascade');
            $table->string('blood_group')->default('A');
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
        Schema::dropIfExists('teachers');
    }
}
