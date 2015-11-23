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
            $data = ['shirt','blue','top','boots','brown','fall','winter','white','gloves','leather','hands','dark blue','button down','oxford','shoes','khakis','pants','work','casual',
        'red','shorts','summer', 'pink','summer','polo'
    ];

            foreach($data as $tagName) {
                $tag = new \Testbed\Tag();
                $tag->name = $tagName;
                $tag->save();
            }
    }

}
