<?php

use Illuminate\Database\Seeder;

class RiderUserTeamTableSeeder extends Seeder
{
   public function run()
  {
//getting laravel collections of Ids, converting them into array
    $riderIds = App\Rider::pluck('id')->toArray();
    $userteamsIds = App\UserTeam::pluck('id')->toArray();

  for($i = 0; $i < 100; $i++) 
  {
        DB::table('rider_user_team')->insert([
            'rider_id' => array_rand($riderIds),
            'user_team_id' => array_rand($userteamsIds)

            
        ]);
  } 

  }
}
