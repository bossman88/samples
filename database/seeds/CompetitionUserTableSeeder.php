<?php

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
class CompetitionUserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
         $faker = Faker::create();



        // for($i = 0; $i < 130; $i++) 
        // {
        //         DB::table('competition_user')->insert([
        //             'competition_id' => factory(App\Competition::class)->create()->id,
        //             'user_id' =>$faker->biasedNumberBetween($min = 1, $max = 400, $function = 'sqrt'),
        //         ]);
            
        // }

    }
}
