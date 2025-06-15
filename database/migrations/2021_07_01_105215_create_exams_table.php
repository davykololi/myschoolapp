<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateExamsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('exams', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->string('name');
            $table->string('initials');
            $table->string('type')->default('End Term Exam');
            $table->string('code');
            $table->string('start_date');
            $table->string('end_date');
            $table->tinyInteger('status')->default(0);
            $table->boolean('results_published')->default(false);
            $table->foreignUuid('school_id')->constrained()->onDelete('cascade');
            $table->foreignUuid('year_id')->constrained()->onDelete('cascade');
            $table->foreignUuid('term_id')->constrained()->onDelete('cascade');
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
        Schema::dropIfExists('exams');
    }
}
