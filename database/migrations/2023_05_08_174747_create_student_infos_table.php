<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('student_infos', function (Blueprint $table) {
            $table->id();
            $table->string('religion')->nullable();
            $table->string('fathers_name')->nullable();
            $table->string('fathers_phone_number')->nullable();
            $table->string('fathers_national_id')->nullable();
            $table->string('fathers_occupation')->nullable();
            $table->string('fathers_designation')->nullable();
            $table->decimal('fathers_annual_income')->default(0);
            $table->string('mothers_name')->nullable();
            $table->string('mothers_phone_number')->nullable();
            $table->string('mothers_national_id')->nullable();
            $table->string('mothers_occupation')->nullable();
            $table->string('mothers_designation')->nullable();
            $table->decimal('mothers_annual_income')->default(0);
            $table->string('guardian_name')->nullable();
            $table->string('guardian_relationship')->nullable();
            $table->string('guardian_phone_number')->nullable();
            $table->string('guardian_occupation')->nullable();
            $table->string('home_email_address')->nullable();
            $table->string('home_postal_address')->nullable();
            $table->bigInteger('student_id')->unsigned()->nullable();
            $table->foreign('student_id')->references('id')->on('students')->onDelete('cascade');
            $table->bigInteger('admin_id')->unsigned()->nullable();
            $table->foreign('admin_id')->references('id')->on('admins')->onDelete('cascade');
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
        Schema::dropIfExists('student_infos');
    }
};
