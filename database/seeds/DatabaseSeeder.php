<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Model::unguard();

        // create two default users
        $this->call(UsersTableSeeder::class);

        // generate additional users
        factory(Testbed\User::class,8)->create();

        // generate items and connect them to users
        factory(Testbed\Item::class,64)->create();

        // $this->call(ItemsTableSeeder::class);

        // Auto generate colors then call seeder for other stuff
        factory(Testbed\Tag::class,64)->create();
        $this->call(TagsTableSeeder::class);


        $this->call(ItemTagTableSeeder::class);


        Model::reguard();
    }
}
