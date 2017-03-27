<?php

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
class RiderSeasonTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
          $faker = Faker::create();
            

            for($i = 0; $i < 100; $i++) 
            {
                        // DB::table('rider_season')->insert([

                        
                        //     'rider_id'=>$faker->biasedNumberBetween($min = 1, $max = 100, $function = 'sqrt'),
                        //     'position'=>$faker->biasedNumberBetween($min = 1, $max = 30, $function = 'sqrt'),
                        //     'points' => $faker->biasedNumberBetween($min = 300, $max = 1200, $function = 'sqrt'),
                        // ]);
            }
        } 
    
}
