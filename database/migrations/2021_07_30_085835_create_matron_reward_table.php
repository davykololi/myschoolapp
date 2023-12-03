<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMatronRewardTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('matron_reward', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('matron_id')->unsigned();
            $table->bigInteger('reward_id')->unsigned();
            $table->foreign('matron_id')->references('id')->on('matrons')->onDelete('cascade');
            $table->foreign('reward_id')->references('id')->on('rewards')->onDelete('cascade');
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
        Schema::dropIfExists('matron_reward');
    }
}
