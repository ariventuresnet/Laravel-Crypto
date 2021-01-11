<?php

use App\Category;
use Illuminate\Database\Seeder;

class DummyCategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Category::insert([
            [
                'name' => 'exchange',
                'slug' =>'exchange',
            ],
            [
                'name' => 'card',
                'slug' =>'card',

            ],
            [
                'name' => 'loan',
                'slug' =>'loan',

            ],
            [
                'name' => 'wallet',
                'slug' =>'wallet',

            ],
            [
                'name' => 'interest account',
                'slug' =>'interest-account',

            ],

        ]);
    }
}
