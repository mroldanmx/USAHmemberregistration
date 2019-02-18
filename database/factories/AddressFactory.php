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

$countries = ['USA', 'Canada'];
$zips = range(99501, 99524);

$factory->define(App\Models\Address::class, function (Faker $faker) use ($countries, $zips) {
    return [
        'address_line_1' => $faker->buildingNumber . ' ' . $faker->streetName,
        'address_line_2' => $faker->secondaryAddress,
        'address_city' => $faker->city,
        'address_state' => $faker->stateAbbr,
        'address_zip' => $faker->randomElement($zips),
        'address_country' => $faker->randomElement($countries),
        'address_foreign_postal' => '',
    ];
});
