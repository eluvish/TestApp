<?php

use Illuminate\Database\Seeder;


class ItemsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('items')->insert([
            'created_at' => Carbon\Carbon::now()->toDateTimeString(),
            'updated_at' => Carbon\Carbon::now()->toDateTimeString(),
            'name' => 'images/2015-11-21-1458.jpg',
            'user_id' => '1',
            ]);

        DB::table('items')->insert([
            'created_at' => Carbon\Carbon::now()->toDateTimeString(),
            'updated_at' => Carbon\Carbon::now()->toDateTimeString(),
            'name' => 'images/2015-11-21-5803.jpg',
            'user_id' => '2',
            ]);

        DB::table('items')->insert([
            'created_at' => Carbon\Carbon::now()->toDateTimeString(),
            'updated_at' => Carbon\Carbon::now()->toDateTimeString(),
            'name' => 'images/2015-11-21-8970.jpg',
            'user_id' => '2',
            ]);

        DB::table('items')->insert([
            'created_at' => Carbon\Carbon::now()->toDateTimeString(),
            'updated_at' => Carbon\Carbon::now()->toDateTimeString(),
            'name' => 'images/2015-11-21-9173.jpg',
            'user_id' => '2',
            ]);

        DB::table('items')->insert([
            'created_at' => Carbon\Carbon::now()->toDateTimeString(),
            'updated_at' => Carbon\Carbon::now()->toDateTimeString(),
            'name' => 'images/2015-11-21-5122.jpg',
            'user_id' => '1',
            ]);

        DB::table('items')->insert([
            'created_at' => Carbon\Carbon::now()->toDateTimeString(),
            'updated_at' => Carbon\Carbon::now()->toDateTimeString(),
            'name' => 'images/2015-11-21-9816.jpg',
            'user_id' => '2',
            ]);

        DB::table('items')->insert([
            'created_at' => Carbon\Carbon::now()->toDateTimeString(),
            'updated_at' => Carbon\Carbon::now()->toDateTimeString(),
            'name' => 'images/2015-11-21-2449.jpg',
            'user_id' => '1',
            ]);

        DB::table('items')->insert([
            'created_at' => Carbon\Carbon::now()->toDateTimeString(),
            'updated_at' => Carbon\Carbon::now()->toDateTimeString(),
            'name' => 'images/2015-11-21-3052.jpg',
            'user_id' => '2',
            ]);

        DB::table('items')->insert([
            'created_at' => Carbon\Carbon::now()->toDateTimeString(),
            'updated_at' => Carbon\Carbon::now()->toDateTimeString(),
            'name' => 'images/2015-11-22-9826.jpg',
            'user_id' => '1',
            ]);

        DB::table('items')->insert([
            'created_at' => Carbon\Carbon::now()->toDateTimeString(),
            'updated_at' => Carbon\Carbon::now()->toDateTimeString(),
            'name' => 'images/2015-11-22-9276.jpg',
            'user_id' => '1',
            ]);

    }
}
