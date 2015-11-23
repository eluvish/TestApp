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
            '%2015-11-21-9816.jpg' => ['shirt','blue','top', 'fall'],
            '%2015-11-21-1458.jpg' => ['boots','brown','leather','fall','winter'],
            '%2015-11-21-8970.jpg' => ['white','gloves','leather','hands','fall'],
            '%2015-11-21-2449.jpg' => ['brown', 'khakis','pants','work','casual'],
            '%2015-11-21-3052.jpg' => ['red','shorts','summer'],
            '%2015-11-21-5122.jpg' => ['pink','summer','polo'],
            '%2015-11-21-5803.jpg' => ['brown','oxford','shoes'],
            '%2015-11-21-9173.jpg' => ['dark blue', 'shirt','button down'],
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
