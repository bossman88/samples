<?php

use Illuminate\Database\Seeder;

class UserTeamsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory('App\UserTeam', 40)->create();
    }
}
