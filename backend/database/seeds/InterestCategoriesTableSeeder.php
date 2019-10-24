<?php

use Illuminate\Database\Seeder;

class InterestCategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\InterestCategory::class, 10)->create();
    }
}
