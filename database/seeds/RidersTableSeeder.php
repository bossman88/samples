<?php

use Illuminate\Database\Seeder;

class RidersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
         factory('App\Rider', 400)->create();  
    }
}
