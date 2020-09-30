<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddColumnsToCardsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('cards', function (Blueprint $table) {
            $table->string('price')->after('limit')->nullable();
            $table->string('delivery_fees')->after('price')->nullable();
            $table->string('coverage')->after('delivery_fees')->nullable();
            $table->string('monthly_fees')->after('coverage')->nullable();
            $table->string('atm_fees')->after('monthly_fees')->nullable();
            $table->string('monthly_atm_limit')->after('atm_fees')->nullable();
            $table->string('online_purchases')->after('monthly_atm_limit')->nullable();
            $table->string('monthly_purchases')->after('online_purchases')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('cards', function (Blueprint $table) {
            $table->dropColumn('price');
            $table->dropColumn('delivery_fees');
            $table->dropColumn('coverage');
            $table->dropColumn('monthly_fees');
            $table->dropColumn('atm_fees');
            $table->dropColumn('monthly_atm_limit');
            $table->dropColumn('online_purchases');
            $table->dropColumn('monthly_purchases');
        });
    }
}
