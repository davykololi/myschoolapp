<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAdminsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('admins', function (Blueprint $table) {
            $table->id();
            $table->string('blood_group')->default('A');
            $table->string('image')->nullable();
            $table->string('emp_no')->nullable();
            $table->string('gender')->nullable();
            $table->string('id_no');
            $table->string('dob');
            $table->string('designation');
            $table->string('current_address')->nullable();
            $table->string('permanent_address')->nullable();
            $table->string('phone_no')->nullable();
            $table->longText('history',2000);
            $table->string('position')->default('Ordinary Admin');
            $table->boolean('is_banned')->default(false);
            $table->bigInteger('user_id')->unsigned();
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreignId('school_id')->constrained()->onDelete('cascade');
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
        Schema::dropIfExists('admins');
    }
}
