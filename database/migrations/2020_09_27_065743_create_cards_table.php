<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCardsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cards', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('logo')->nullable();
            $table->string('url');
            $table->string('currencies');
            $table->string('countries');
            $table->string('payments');
            $table->text('description');
            $table->text('pros')->nullable();
            $table->text('cons')->nullable();
            $table->text('ease');
            $table->text('privacy');
            $table->string('speed');
            $table->string('fee');
            $table->text('reputation');
            $table->text('limit');
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
        Schema::dropIfExists('cards');
    }
}
