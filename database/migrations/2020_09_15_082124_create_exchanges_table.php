<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateExchangesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('exchanges', function (Blueprint $table) {
            $table->id();
            $table->string('Name');
            $table->string('logo');
            $table->string('url');
            $table->string('currency');
            $table->string('country');
            $table->string('payment');
            $table->string('description');
            $table->string('pros');
            $table->string('cons');
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
        Schema::dropIfExists('exchanges');
    }
}
