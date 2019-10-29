<?php

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Model::unguard();
        $this->call('UsersTableSeeder');
        $this->call('InterestCategoriesTableSeeder');
        $this->call('ArticlesTableSeeder');
        $this->call('UserKmAttributesTableSeeder');
        $this->call('TestCategoriesTableSeeder');
        $this->call('TestsTableSeeder');
        $this->call('QuestionsTableSeeder');
        $this->call('QuestionChoicesTableSeeder');
        $this->call('TestHistoriesTableSeeder');
        Model::reguard();
    }
}
