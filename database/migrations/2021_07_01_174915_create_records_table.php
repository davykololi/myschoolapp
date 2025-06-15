<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRecordsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('records', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->string('desc');
            $table->longText('content');
            $table->foreignUuid('student_id')->nullable()->constrained()->onDelete('cascade');
            $table->foreignUuid('school_id')->nullable()->constrained()->onDelete('cascade');
            $table->foreignUuid('stream_id')->nullable()->constrained()->onDelete('cascade');
            $table->foreignUuid('department_id')->nullable()->constrained()->onDelete('cascade');
            $table->foreignUuid('teacher_id')->nullable()->constrained()->onDelete('cascade');
            $table->foreignUuid('subordinate_id')->nullable()->constrained()->onDelete('cascade');
            $table->foreignUuid('librarian_id')->nullable()->constrained()->onDelete('cascade');
            $table->foreignUuid('matron_id')->nullable()->constrained()->onDelete('cascade');
            $table->foreignUuid('accountant_id')->nullable()->constrained()->onDelete('cascade');
            $table->foreignUuid('admin_id')->nullable()->constrained()->onDelete('cascade');
            $table->foreignUuid('class_id')->nullable()->constrained()->onDelete('cascade');
            $table->foreignUuid('dormitory_id')->nullable()->constrained()->onDelete('cascade');
            $table->foreignUuid('intake_id')->nullable()->constrained()->onDelete('cascade');
            $table->foreignUuid('subject_id')->nullable()->constrained()->onDelete('cascade');
            $table->foreignUuid('event_id')->nullable()->constrained()->onDelete('cascade');
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
        Schema::dropIfExists('records');
    }
}
