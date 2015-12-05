<?php

use Illuminate\Database\Seeder;

class ItemTagTableSeeder extends Seeder
{
    /*
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $tags = \myCloset\Tag::all();

        $items = \myCloset\Item::all();

        foreach($items as $item)
        {
            for ($i = 0; $i < 4; $i++)
            {
                $tag = $tags->random();
                $item->tags()->save($tag);
            }

        }
    }
}
