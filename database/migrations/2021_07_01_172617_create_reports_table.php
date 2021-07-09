<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateReportsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('reports', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('maths_mark');
            $table->string('english_mark');
            $table->string('kisw_mark');
            $table->string('science_mark');
            $table->string('cre_mark');
            $table->string('recommendation');
            $table->bigInteger('school_id')->unsigned();
            $table->bigInteger('class_id')->nullable()->unsigned();
            $table->bigInteger('stream_id')->nullable()->unsigned();
            $table->bigInteger('teacher_id')->nullable()->unsigned();
            $table->bigInteger('term_id')->nullable()->unsigned();
            $table->bigInteger('year_id')->nullable()->unsigned();
            $table->foreign('school_id')->references('id')->on('schools')->onDelete('cascade');
            $table->foreign('class_id')->references('id')->on('classes')->onDelete('cascade');
            $table->foreign('stream_id')->references('id')->on('streams')->onDelete('cascade');
            $table->foreign('teacher_id')->references('id')->on('teachers')->onDelete('cascade');
            $table->foreign('year_id')->references('id')->on('years')->onDelete('cascade');
            $table->foreign('term_id')->references('id')->on('terms')->onDelete('cascade');
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
        Schema::dropIfExists('reports');
    }
}
