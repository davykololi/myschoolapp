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
            $table->string('salutation')->nullable();
            $table->string('first_name');
            $table->string('middle_name');
            $table->string('last_name');
            $table->string('blood_group')->default('A');
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
            $table->longText('history',2000);
            $table->string('role')->default('ordinaryadmin');
            $table->boolean('is_banned')->default(false);
            $table->bigInteger('school_id')->unsigned();
            $table->foreign('school_id')->references('id')->on('schools')->onDelete('cascade');
            $table->bigInteger('superadmin_id')->unsigned();
            $table->foreign('superadmin_id')->references('id')->on('superadmins');
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
