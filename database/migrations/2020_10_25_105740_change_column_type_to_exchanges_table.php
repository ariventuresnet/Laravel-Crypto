<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class ChangeColumnTypeToExchangesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('exchanges', function (Blueprint $table) {
            $table->text('currencies')->change();
            $table->text('countries')->change();
            $table->text('payments')->change();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('exchanges', function (Blueprint $table) {
            //
        });
    }
}
