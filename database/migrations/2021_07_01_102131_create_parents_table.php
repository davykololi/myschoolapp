<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateParentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('parents', function (Blueprint $table) {
            $table->id();
            $table->string('salutation')->nullable();
            $table->string('name');
            $table->string('image')->nullable();
            $table->string('id_no');
            $table->string('phone_no')->nullable();
            $table->string('email')->unique();
            $table->string('password');
            $table->rememberToken();
            $table->foreignId('school_id')->constrained()->onDelete('cascade');
            $table->boolean('is_banned')->default(false);
            $table->string('lock')->default('enabled');
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
        Schema::dropIfExists('parents');
    }
}
