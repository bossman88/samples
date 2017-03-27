<?php
use App\User;
/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| Here you may define all of your model factories. Model factories give
| you a convenient way to create models for testing and seeding your
| database. Just tell the factory how a default model should look.
|
*/

/** @var \Illuminate\Database\Eloquent\Factory $factory */
$factory->define(App\User::class, function (Faker\Generator $faker) {
    static $password;

    return [
        'username' => $faker->userName,
        'first_name' => $faker->firstName,
        'last_name' => $faker->lastName ,
        'country' => $faker->countryCode,
        'city' => $faker->city,
        'address' => $faker->address,
        'email' => $faker->unique()->safeEmail,
        'password' => $password ?: $password = bcrypt('secret'),
        'remember_token' => str_random(10),
    ];
});

$factory->define(App\Rider::class, function (Faker\Generator $faker) {
    static $password;

    return [
        'team_id' => $faker->freeEmailDomain,
        'first_name' => $faker->firstNameMale,
        'last_name' => $faker->lastName,
        'country_name' => $faker->countryCode,
        'hills' => $faker->biasedNumberBetween($min = 1, $max = 5, $function = 'sqrt'),
        'cobbles' => $faker->biasedNumberBetween($min = 1, $max = 5, $function = 'sqrt'),
        'mountains' => $faker->biasedNumberBetween($min = 1, $max = 5, $function = 'sqrt'),
        'sprint' => $faker->biasedNumberBetween($min = 1, $max = 5, $function = 'sqrt'),
        'timetrial' => $faker->biasedNumberBetween($min = 1, $max = 5, $function = 'sqrt'),        
        'price' => $faker->biasedNumberBetween($min = 20000, $max = 5000000, $function = 'sqrt'),
        'height' => $faker->biasedNumberBetween($min = 155, $max = 200, $function = 'sqrt'),
        'weight' => $faker->biasedNumberBetween($min = 55, $max = 90, $function = 'sqrt'),
        'team_id' => $faker->biasedNumberBetween($min = 1, $max = 20, $function = 'sqrt'),
        'link_to_rider_img' => $faker->imageUrl($width = 640, $height = 480),
        'total_rider_points' => $faker->biasedNumberBetween($min = 400, $max = 1200, $function = 'sqrt')
    ];
});

$factory->define(App\Race::class, function (Faker\Generator $faker) {
    static $password;

    return [
        'name' => $faker->timezone,
        'season_id' => $faker->biasedNumberBetween($min = 1, $max = 2, $function = 'sqrt'),
        'country' => $faker->countryCode,
        'hills' => $faker->biasedNumberBetween($min = 1, $max = 5, $function = 'sqrt'),
        'cobbles' => $faker->biasedNumberBetween($min = 1, $max = 5, $function = 'sqrt'),
        'mountains' => $faker->biasedNumberBetween($min = 1, $max = 5, $function = 'sqrt'),
        'sprint' => $faker->biasedNumberBetween($min = 1, $max = 5, $function = 'sqrt'),
        'timetrial' => $faker->biasedNumberBetween($min = 1, $max = 5, $function = 'sqrt'),

    ];
});

$factory->define(App\Team::class, function (Faker\Generator $faker) {
    static $password;

    return [
        'team_name' => $faker->company,
        'team_country' => $faker->countryCode, 
        'abbreviation' => $faker->stateAbbr,  
        'status' => $faker->biasedNumberBetween($min = 1, $max = 3, $function = 'sqrt'), 
         
    ];
});

$factory->define(App\UserTeam::class, function (Faker\Generator $faker) {
    static $password;

    return [
        'user_id' => factory(App\User::class)->create()->id,
        'name' => $faker->unique()->domainName,
        'points' => $faker->biasedNumberBetween($min = 500, $max = 5000, $function = 'sqrt'),
        'budget_spent' =>$faker->biasedNumberBetween($min = 20000, $max = 5000000, $function = 'sqrt'),
        'is_paid' => $faker->boolean,

    ];
});

$factory->define(App\Season::class, function (Faker\Generator $faker) {
    static $password;

    return [
       
    ];
});

$factory->define(App\Competition::class, function (Faker\Generator $faker) {
    static $password;

    return [
        'name' => 'World Tour Manager 2017/2018',
        'is_private' => '0',
        'is_current' => '1',   
    ];
});