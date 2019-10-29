<?php

use App\TestCategory;
use Illuminate\Database\Seeder;

class TestCategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        TestCategory::create([
            'name' => 'pre test',
        ]);
        TestCategory::create([
            'name' => 'post test',
        ]);
    }
}
