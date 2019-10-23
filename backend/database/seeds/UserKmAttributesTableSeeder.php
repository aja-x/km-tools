<?php

use Illuminate\Database\Seeder;

class UserKmAttributesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\UserKmAttribute::class, 10)->create();
    }
}
