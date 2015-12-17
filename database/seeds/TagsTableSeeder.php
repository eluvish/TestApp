<?php

use Illuminate\Database\Seeder;

class TagsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
            $data = ['brown','black','blue','casual','work','fall','summer','shorts','jeans'];


            foreach($data as $tagName) {
                $tag = new \myCloset\Tag();
                $tag->name = $tagName;
                $tag->save();
            }
    }

}
