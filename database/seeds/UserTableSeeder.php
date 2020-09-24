<?php

use Illuminate\Database\Seeder;
use App\User;
use Illuminate\Support\Facades\Hash;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::insert([
            [
                "name"=>'admin',
                "email"=>'admin@thecryptocutter.com',
                "password"=> Hash::make('&xGDrBva6@@9')
            ],
            [
                "name"=>'team',
                "email"=>'team@thecryptocutter.com',
                "password"=> Hash::make('E&XhYoOxl3Ev')
            ]
        ]);
    }
}
