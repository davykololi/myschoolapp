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
            $table->uuid('id')->primary();
            $table->string('image')->nullable();
            $table->string('gender');
            $table->string('emp_no')->nullable();
            $table->string('id_no');
            $table->string('dob');
            $table->string('designation');
            $table->string('current_address')->nullable();
            $table->string('permanent_address')->nullable();
            $table->string('phone_no')->nullable();
            $table->string('position')->default('Ordinary Accountant');
            $table->longText('history',2000);
            $table->foreignUuid('user_id')->constrained()->onDelete('cascade');
            $table->string('blood_group')->default('A');
            $table->foreignUuid('school_id')->constrained()->onDelete('cascade');
            $table->boolean('is_banned')->default(false);
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
