<?php

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;

class ItemsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $types = ['top','bottom','shoe'];

        // add accessory later
        // $types = ['top','bottom','shoe','accessory'];

        $items = \myCloset\Item::all();

        foreach($items as $item)
        {
            $key = array_rand($types);
            $item->type = $types[$key];
            $item->save();
        }
    }
}
