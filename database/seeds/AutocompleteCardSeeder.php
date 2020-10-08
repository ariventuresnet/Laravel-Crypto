<?php

use App\AutocompleteCard;
use Illuminate\Database\Seeder;

class AutocompleteCardSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        AutocompleteCard::create([
            "no_of_currency" => 0,
            "no_of_country" => 0,
            "no_of_payment_method" => 0,
            "no_of_diposit" => 0,
            "no_of_collateral" => 0,
            "no_of_wallet" => 0,
        ]);
    }
}
