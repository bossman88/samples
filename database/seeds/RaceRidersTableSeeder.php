<?php

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
class RaceRidersTableSeeder extends Seeder
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
            DB::table('race_rider')->insert([
                'race_id' =>$faker->biasedNumberBetween($min = 1, $max = 40, $function = 'sqrt'),
                'rider_id' =>$faker->biasedNumberBetween($min = 1, $max = 400, $function = 'sqrt'),
                'position' =>$faker->biasedNumberBetween($min = 1, $max = 20, $function = 'sqrt'),
                'points' => $faker->biasedNumberBetween($min = 5, $max = 240, $function = 'sqrt'),
            ]);
        } 
    }
}
