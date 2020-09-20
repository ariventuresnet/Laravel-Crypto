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
            $table->string('logo')->nullable();
            $table->string('url');
            $table->string('currencies');
            $table->string('countries');
            $table->string('payments');
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
