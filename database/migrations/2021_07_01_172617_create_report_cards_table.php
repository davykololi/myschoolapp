<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateReportCardsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('report_cards', function (Blueprint $table) {
            $table->unsignedBigInteger('id')->primary();
            $table->string('name');
            $table->bigInteger('maths')->unsigned();
            $table->bigInteger('eng')->unsigned();
            $table->bigInteger('kisw')->unsigned();
            $table->bigInteger('chem')->unsigned()->nullable();
            $table->bigInteger('bio')->unsigned()->nullable();
            $table->bigInteger('physics')->unsigned()->nullable();
            $table->bigInteger('cre')->unsigned()->nullable();
            $table->bigInteger('islam')->unsigned()->nullable();
            $table->bigInteger('hist')->unsigned()->nullable();
            $table->bigInteger('ghc')->unsigned()->nullable();
            $table->string('recommendation')->nullable();
            $table->foreignUuid('school_id')->nullable()->constrained()->onDelete('cascade');
            $table->foreignUuid('class_id')->nullable()->constrained()->onDelete('cascade');
            $table->foreignUuid('stream_id')->nullable()->constrained()->onDelete('cascade');
            $table->foreignUuid('teacher_id')->nullable()->constrained()->onDelete('cascade');
            $table->foreignUuid('year_id')->nullable()->constrained()->onDelete('cascade');
            $table->foreignUuid('term_id')->nullable()->constrained()->onDelete('cascade');
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
        Schema::dropIfExists('report_cards');
    }
}
