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
        Schema::create('report_remarks', function (Blueprint $table) {
            $table->id();
            $table->string('remark');
            $table->bigInteger('from_total')->nullable();
            $table->bigInteger('to_total')->nullable();
            $table->string('remark_id')->unique();
            $table->foreignUuid('class_id')->constrained()->onDelete('cascade');
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
        Schema::dropIfExists('report_remarks');
    }
};
