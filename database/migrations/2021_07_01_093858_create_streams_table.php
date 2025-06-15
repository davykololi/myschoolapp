<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStreamsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('streams', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->string('name');
            $table->string('class_teacher')->nullable();
            $table->string('class_prefect')->nullable();
            $table->string('code');
            $table->foreignUuid('class_id')->constrained()->onDelete('cascade');
            $table->foreignUuid('stream_section_id')->constrained()->onDelete('cascade');
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
        Schema::dropIfExists('streams');
    }
}
