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

            $table->integer('user_id')->unsigned();
            $table->foreign('user_id')->references('id')->on('users');

            $table->string('top_id')->unsigned();
            $table->foreign('top_id')->references('id')->on('items');

            $table->string('bottom_id')->unsigned();
            $table->foreign('bottom_id')->references('id')->on('items');

            $table->string('shoe_id')->unsigned();
            $table->foreign('shoe_id')->references('id')->on('items');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        // Schema::drop('outfits');
    }
}
