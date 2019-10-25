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
use App\Question;
use App\Test;
use App\User;
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

$factory->define(App\UserKmAttribute::class, function (Faker\Generator $faker) {
    $id_user = User::all()->pluck('id')->toArray();
    $id_interest = InterestCategory::all()->pluck('id')->toArray();
    return [
        'id_user' => $faker->unique()->randomElement($id_user),
        'id_interest_category' => $faker->randomElement($id_interest),
    ];
});

$factory->define(App\Question::class, function (Faker\Generator $faker) {
    $id_test = Test::all()->pluck('id')->toArray();
    return [
        'content' => $faker->sentence(10),
        'id_test' => $faker->randomElement($id_test),
    ];
});

$factory->define(App\QuestionChoice::class, function (Faker\Generator $faker) {
    $id_question = Question::all()->pluck('id')->toArray();
    return [
        'content' => $faker->sentence(),
        'is_correct' => $faker->boolean(25),
        'id_question' => $faker->randomElement($id_question),
    ];
});

$factory->define(App\TestHistory::class, function (Faker\Generator $faker) {
    $id_user = User::all()->pluck('id')->toArray();
    $id_test = Test::all()->pluck('id')->toArray();
    return [
        'score' => $faker->numberBetween(0, 100),
        'completed_time' => $faker->dateTime(),
        'id_user' => $faker->randomElement($id_user),
        'id_test' => $faker->randomElement($id_test),
    ];
});
