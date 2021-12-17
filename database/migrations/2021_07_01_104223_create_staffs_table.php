<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStaffsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('staffs', function (Blueprint $table) {
            $table->id();
            $table->string('title')->nullable();
            $table->string('name');
            $table->string('image')->nullable();
            $table->string('emp_no');
            $table->string('email')->unique();
            $table->string('gender')->nullable();
            $table->string('password');
            $table->rememberToken();
            $table->string('id_no');
            $table->string('dob');
            $table->string('designation');
            $table->string('address')->nullable();
            $table->string('phone_no')->nullable();
            $table->longText('history',2000);
            $table->foreignId('school_id')->constrained()->onDelete('cascade');
            $table->bigInteger('bg_id')->unsigned();
            $table->foreign('bg_id')->references('id')->on('blood_groups');
            $table->foreignId('admin_id')->constrained();
            $table->foreignId('position_staff_id')->constrained();
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
        Schema::dropIfExists('staffs');
    }
}
