<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateWalletsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('wallets', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('logo')->nullable();
            $table->string('url');
            $table->string('currencies');
            $table->string('type');
            $table->text('description');
            $table->text('pros')->nullable();
            $table->text('cons')->nullable();
            $table->string('btc_only');
            $table->string('lightning');
            $table->string('liquid');
            $table->string('security');
            $table->string('multi_sig');
            $table->string('buy_crypto');
            $table->string('ease');
            $table->string('privacy');
            $table->string('speed');
            $table->string('fee');
            $table->string('reputation');
            $table->string('limit');
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
        Schema::dropIfExists('wallets');
    }
}
