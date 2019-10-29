<?php

use Illuminate\Database\Seeder;

class QuestionChoicesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\QuestionChoice::class, 50)->create();
    }
}
