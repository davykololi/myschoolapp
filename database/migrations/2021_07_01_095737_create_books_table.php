<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBooksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('books', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->string('title');
            $table->string('author');
            $table->bigInteger('units')->unsigned();
            $table->string('rack_no');
            $table->integer('row_no');
            $table->string('book_id')->unique();
            $table->foreignUuid('school_id')->constrained()->onDelete('cascade');
            $table->foreignUuid('library_id')->constrained()->onDelete('cascade');
            $table->foreignUuid('book_genre_id')->constrained()->onDelete('cascade');
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
        Schema::dropIfExists('books');
    }
}
