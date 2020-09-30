<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddColumnsToExchangesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('exchanges', function (Blueprint $table) {
            $table->string('bitcoin_only')->after('limit')->nullable();
            $table->string('recurring_buys')->after('bitcoin_only')->nullable();
            $table->string('lightning')->after('recurring_buys')->nullable();
            $table->string('liquid')->after('lightning')->nullable();
            $table->string('kyc')->after('liquid')->nullable();
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
            $table->dropColumn('bitcoin_only');
            $table->dropColumn('recurring_buys');
            $table->dropColumn('lightning');
            $table->dropColumn('liquid');
            $table->dropColumn('kyc');
        });
    }
}
