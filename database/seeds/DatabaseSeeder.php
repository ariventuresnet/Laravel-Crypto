<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(UserSeeder::class);
        $this->call(UserTableSeeder::class);
        $this->call(DummyCategorySeeder::class);
        $this->call(DummyPostSeeder::class);
        $this->call(AutocompleteCardSeeder::class);
    }
}
