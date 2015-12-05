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
            $data = ['shirt',
            'top',
            'boots',
            'gloves',
            'leather',
            'hands',
            'button down',
            'oxford',
            'khakis',
            'pants',
            'work',
            'casual',
            'shorts',
            'pink',
            'polo',
            'Boat Shoe',
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
