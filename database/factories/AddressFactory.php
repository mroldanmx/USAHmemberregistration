<?php

use App\Models\Address;
use Faker\Generator as Faker;
use Illuminate\Support\Facades\Log;

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| This directory should contain each of the model factory definitions for
| your application. Factories provide a convenient way to generate new
| model instances for testing / seeding your application's database.
|
*/

$countries = ['US', 'CA'];
$zips = range(99501, 99524);

$factory->define(App\Models\Address::class, function (Faker $faker) use ($countries, $zips) {
    return [
        'line_1' => $faker->buildingNumber . ' ' . $faker->streetName,
        'line_2' => $faker->secondaryAddress,
        'city' => $faker->city,
        'state' => $faker->stateAbbr,
        'country' => $faker->randomElement($countries),
        'zip' => $faker->randomElement($zips),
    ];
});
