<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStreamSubjectsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('stream_subjects', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->string('desc');
            $table->foreignUuid('teacher_id')->nullable()->constrained()->onDelete('cascade');
            $table->foreignUuid('subject_id')->nullable()->constrained()->onDelete('cascade');
            $table->foreignUuid('stream_id')->nullable()->constrained()->onDelete('cascade');
            $table->foreignUuid('school_id')->constrained()->onDelete('cascade');
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
        Schema::dropIfExists('stream_subjects');
    }
}
