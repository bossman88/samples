<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
     protected $toTruncate = ['users','shirts', 'races', 'teams', 'user_teams','rider_user_team', 'race_rider', 'competitions', 'seasons', 'competition_user', 'rider_season'];
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
         foreach($this->toTruncate as $table){
            DB::table('riders')->truncate();
            DB::table('users')->truncate();
            DB::table('races')->truncate();
            DB::table('teams')->truncate();
            DB::table('user_teams')->truncate();
            DB::table('rider_user_team')->truncate();
            DB::table('race_rider')->truncate();
            DB::table('seasons')->truncate();
            DB::table('competitions')->truncate();
            DB::table('competition_user')->truncate();
            DB::table('rider_season')->truncate();
        }
         $this->call(UsersTableSeeder::class);
         $this->call(RidersTableSeeder::class);
         $this->call(RacesTableSeeder::class);
         $this->call(TeamsTableSeeder::class);
         $this->call(UserTeamsTableSeeder::class);
         $this->call(RiderUserTeamTableSeeder::class);
         $this->call(RaceRidersTableSeeder::class);
         $this->call(CompetitionsTableSeeder::class);
         $this->call(CompetitionUserTableSeeder::class);
         $this->call(SeasonsTableSeeder::class);
         $this->call(RiderSeasonTableSeeder::class);
         
    }
}
