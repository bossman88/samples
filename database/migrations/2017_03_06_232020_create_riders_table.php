<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRidersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('riders', function (Blueprint $table) {
            $table->increments('id');
            
            $table->string('first_name')->default(NULL);
            $table->string('last_name')->default(NULL);
            $table->string('country_name');
            $table->integer('price')->default(500000)->nullable();
            $table->integer('hills')->default(0);
            $table->integer('cobbles')->default(0);
            $table->integer('mountains')->default(0);
            $table->integer('sprint')->default(0);
            $table->integer('timetrial')->default(0);
            $table->date('date_of_birth')->default(NULL)->nullable();
            $table->float('height')->default(NULL)->nullable();
            $table->integer('weight')->default(NULL)->nullable();
            $table->integer('team_id');
            $table->string('link_to_rider_img')->default(NULL)->nullable();
            $table->integer('total_rider_points')->default(0)->nullable();
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
        Schema::dropIfExists('riders');
    }
}
