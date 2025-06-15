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
        Schema::create('image_galleries', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->string('title',100)->unique();
            $table->text('description',200);
            $table->string('slug',200)->unique();
            $table->string('image');
            $table->text('keywords');
            $table->string('published_by')->nullable();
            $table->boolean('is_published')->default(false);
            $table->foreignUuid('admin_id')->constrained()->onDelete('cascade');
            $table->foreignUuid('school_id')->constrained()->onDelete('cascade');
            $table->foreignUuid('section_id')->constrained()->onDelete('cascade');
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
        Schema::dropIfExists('image_galleries');
    }
};
