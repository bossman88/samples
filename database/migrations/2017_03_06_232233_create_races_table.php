<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRacesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('races', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('season_id');
            $table->string('name');
            $table->date('date')->default(NULL)->nullable();;
            $table->date('date_start')->default(NULL)->nullable();
            $table->date('date_end')->default(NULL)->nullable();
            $table->string('country');
            $table->string('country_flag')->default(NULL)->nullable();
            $table->integer('hills')->default(0);
            $table->integer('cobbles')->default(0);
            $table->integer('mountains')->default(0);
            $table->integer('sprint')->default(0);
            $table->integer('timetrial')->default(0);
            $table->integer('processed')->default(0);
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
        Schema::dropIfExists('races');
    }
}
