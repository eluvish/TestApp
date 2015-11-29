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
            $data = ['shirt','blue','top','boots','brown','white','gloves','leather','hands','dark blue','button down','oxford','shoes','khakis','pants','work','casual',
        'red','shorts','pink','polo',         'Boat Shoe',
                'Court Shoe',
                'Derby Shoe',
                'Mocassin',
                'Sneaker',
                'Slipper',
                'Boot',
                'Sandal',
                'Oxford',
                'Cap-Toe',
                'Fall',
                'Winter',
                'Spring',
                'Summer',
    ];

            foreach($data as $tagName) {
                $tag = new \myCloset\Tag();
                $tag->name = $tagName;
                $tag->save();
            }
    }

}
