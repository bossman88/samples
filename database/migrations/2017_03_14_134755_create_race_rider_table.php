<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRaceRiderTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('race_rider', function (Blueprint $table) {
            $table->integer('race_id');
            $table->integer('rider_id');
            $table->primary(['race_id', 'rider_id']);
            $table->integer('points')->default(0);
            $table->integer('position')->default(0);
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
        //
    }
}
