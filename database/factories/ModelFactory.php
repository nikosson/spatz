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

use App\Models\User;

$factory->define(App\Models\User::class, function (Faker\Generator $faker) {
    static $password;

    return [
        'name' => $faker->userName,
        'email' => $faker->unique()->safeEmail,
        'password' => $password ?: $password = bcrypt('secret'),
        'remember_token' => str_random(10),
    ];
});

$factory->define(App\Models\Question::class, function (Faker\Generator $faker) {

    return [
        'title' => $faker->sentence,
        'body' => $faker->paragraph(20),
        'user_id' => factory(User::class)->create()->id,
        'channel_id' => mt_rand(1,3),
        'views' => 0
    ];
});

$factory->define(App\Models\Channel::class, function (Faker\Generator $faker) {

    return [
        'title' => $faker->word,
        'slug' => $faker->word,
        'color' => $faker->hexColor,
        'info' => $faker->sentence,
        'url' => $faker->url
    ];
});

