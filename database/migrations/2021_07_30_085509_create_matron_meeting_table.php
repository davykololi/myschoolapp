<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMatronMeetingTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('matron_meeting', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('matron_id')->unsigned();
            $table->bigInteger('meeting_id')->unsigned();
            $table->foreign('matron_id')->references('id')->on('matrons')->onDelete('cascade');
            $table->foreign('meeting_id')->references('id')->on('meetings')->onDelete('cascade');
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
        Schema::dropIfExists('matron_meeting');
    }
}
