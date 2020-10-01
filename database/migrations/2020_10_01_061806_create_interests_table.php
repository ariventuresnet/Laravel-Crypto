<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInterestsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('interests', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('logo')->nullable();
            $table->string('url');
            $table->string('deposits');
            $table->string('countries');
            $table->text('description');
            $table->text('pros')->nullable();
            $table->text('cons')->nullable();
            $table->string('btc_only');
            $table->string('term');
            $table->string('interest');
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
        Schema::dropIfExists('interests');
    }
}
