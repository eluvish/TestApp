<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateItemTagTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('item_tag', function (Blueprint $table) {

        $table->increments('id');
        $table->timestamps();

        # `book_id` and `tag_id` will be foreign keys, so they have to be unsigned
        #  Note how the field names here correspond to the tables they will connect...
        # `book_id` will reference the `books table` and `tag_id` will reference the `tags` table.
        $table->integer('item_id')->unsigned();
        $table->integer('tag_id')->unsigned();

        # Make foreign keys
        $table->foreign('item_id')->references('id')->on('items');
        $table->foreign('tag_id')->references('id')->on('tags');
        });
    }
    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('item_tag');
    }
}
