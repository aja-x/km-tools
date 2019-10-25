<?php

use Illuminate\Database\Seeder;

class TestHistoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\TestHistory::class, 10)->create();
    }
}
