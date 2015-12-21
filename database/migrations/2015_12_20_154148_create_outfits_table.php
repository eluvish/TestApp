<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOutfitsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
    Schema::create('outfits', function (Blueprint $table) {
        $table->increments('id');
        $table->timestamps();
        $table->integer('top')->unsigned();
        $table->integer('bottom')->unsigned();
        $table->integer('shoe')->unsigned();
        $table->integer('user_id')->unsigned();

        $table->foreign('user_id')
        ->references('id')
        ->on('users')
        ->onDelete('cascade');

        $table->foreign('top')
        ->references('id')
        ->on('items')
        ->onDelete('cascade');

        $table->foreign('bottom')
        ->references('id')
        ->on('items')
        ->onDelete('cascade');

        $table->foreign('shoe')
        ->references('id')
        ->on('items')
        ->onDelete('cascade');
    });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('outfits');
    }
}
