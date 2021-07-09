<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAccountantsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('accountants', function (Blueprint $table) {
            $table->id();
            $table->string('title')->nullable();
            $table->string('first_name');
            $table->string('middle_name');
            $table->string('last_name');
            $table->string('image')->nullable();
            $table->string('emp_no')->nullable();
            $table->string('email')->unique();
            $table->string('password');
            $table->rememberToken();
            $table->string('id_no');
            $table->string('dob');
            $table->string('designation');
            $table->string('current_address')->nullable();
            $table->string('permanent_address')->nullable();
            $table->string('phone_no')->nullable();
            $table->longText('history',2000);
            $table->foreignId('school_id')->constrained()->onDelete('cascade');
            $table->foreignId('position_accountant_id')->constrained()->onDelete('cascade');
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
        Schema::dropIfExists('accountants');
    }
}
