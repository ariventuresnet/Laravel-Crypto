<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAutocompleteCardsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('autocomplete_cards', function (Blueprint $table) {
            $table->id();
            $table->integer('no_of_currency');
            $table->integer('no_of_country');
            $table->integer('no_of_payment_method');
            $table->integer('no_of_diposit');
            $table->integer('no_of_collateral');
            $table->integer('no_of_wallet');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('autocomplete_cards');
    }
}
