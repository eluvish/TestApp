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
        $items =[
            '%oxford shirt' => ['shirt','blue','top', 'fall'],
            '%chipewwa boots' => ['boots','brown','leather','fall','winter'],
            '%ralph lauren tie' => ['white','gloves','leather','hands','fall']
        ];

        foreach($items as $item => $tags) {
            $book = \Testbed\Item::where('name','like',$item)->first();

                foreach($tags as $tagName) {
                    $tag = \Testbed\Tag::where('name','LIKE',$tagName)->first();
                    $book->tags()->save($tag);
                }

        }
    }
}
