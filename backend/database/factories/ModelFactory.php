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

use App\InterestCategory;
use Illuminate\Support\Facades\Hash;

$factory->define(App\User::class, function (Faker\Generator $faker) {
    return [
        'name' => $faker->name,
        'username' => $faker->userName,
        'email' => $faker->email,
        'password' => Hash::make('12345'),
    ];
});

$factory->define(App\InterestCategory::class, function (Faker\Generator $faker) {
    return [
        'name' => $faker->jobTitle,
    ];
});

$factory->define(App\Article::class, function (Faker\Generator $faker) {
    $id_interest = InterestCategory::all()->pluck('id')->toArray();
    return [
        'title' => $faker->sentence,
        'content' => $faker->paragraph,
        'last_edited' => $faker->dateTime,
        'published_date' => $faker->dateTime,
        'id_interest_category' => $faker->randomElement($id_interest),
    ];
});
