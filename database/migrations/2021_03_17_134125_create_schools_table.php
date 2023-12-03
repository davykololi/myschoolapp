<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSchoolsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('schools', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('type')->default('County School');
            $table->string('initials');
            $table->string('code');
            $table->string('head');
            $table->string('ass_head');
            $table->string('motto');
            $table->string('vision');
            $table->string('mission');
            $table->string('email');
            $table->string('postal_address');
            $table->bigInteger('students_no')->nullable();
            $table->text('core_values');
            $table->string('image')->nullable();
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
        Schema::dropIfExists('schools');
    }
}
