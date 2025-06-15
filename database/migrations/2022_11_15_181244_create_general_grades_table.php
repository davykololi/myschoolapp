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
        Schema::create('general_grades', function (Blueprint $table) {
            $table->id();
            $table->string('grade');
            $table->string('grade_no')->unique();
            $table->float('points');
            $table->integer('from_mark');
            $table->integer('to_mark');
            $table->foreignUuid('year_id')->nullable()->constrained()->onDelete('cascade');
            $table->foreignUuid('term_id')->nullable()->constrained()->onDelete('cascade');
            $table->foreignUuid('exam_id')->nullable()->constrained()->onDelete('cascade');
            $table->foreignUuid('class_id')->nullable()->constrained()->onDelete('cascade');
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
        Schema::dropIfExists('general_grades');
    }
};
