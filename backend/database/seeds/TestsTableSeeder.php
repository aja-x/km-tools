<?php

use App\Test;
use Illuminate\Database\Seeder;

class TestsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @param \Faker\Generator $faker
     * @return void
     */
    public function run(Faker\Generator $faker)
    {
        foreach (range(1, 10) as $item) {
            Test::create([
                'duration' => $faker->time(),
                'id_article' => $item,
                'id_test_category' => 1,
            ]);
        }
        foreach (range(1, 10) as $item) {
            Test::create([
                'duration' => $faker->time(),
                'id_article' => $item,
                'id_test_category' => 2,
            ]);
        }
    }
}
