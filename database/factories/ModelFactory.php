<?php

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| Here you may define all of your model factories. Model factories give
| you a convenient way to create models for testing and seeding your
| database. Just tell the factory how a default model should look.
|
*/

$factory->define(Testbed\User::class, function (Faker\Generator $faker) {
    return [
        'name' => $faker->name,
        'email' => $faker->email,
        'password' => bcrypt(str_random(10)),
        'remember_token' => str_random(10),
    ];
});

$factory->define(Testbed\Item::class, function (Faker\Generator $faker) {
    return [
        // 'name' => $faker->image($dir = 'images', $width = 300, $height = 250),
        'name' => $faker->imageUrl($width = 300, $height = 250),
        'user_id' => rand(1,8),
    ];
});

$factory->define(Testbed\Tag::class, function (Faker\Generator $faker) {
    return [
        'name' => $faker->ColorName,
    ];
});
