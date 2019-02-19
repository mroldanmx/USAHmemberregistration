<?php

use App\Models\Member;
use App\Models\Address;
use Faker\Generator as Faker;

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

$genders = ['Male', 'Female'];
$factory->define(App\Models\Member::class, function (Faker $faker) use ($genders) {
	$gender = $faker->randomElement($genders);
    return [
    	'address_id' => function () {
            return factory(App\Models\Address::class)->create()->id;
        },
        'first_name' => $faker->firstName(strtolower($gender)),
        'last_name' => $faker->lastName,
        'gender' => $gender[0],
        'dob' => $faker->dateTime,
        'phone_1' => $faker->numerify('###-###-###'),
        'phone_2' => $faker->numerify('###-###-###'),
        'email' => $faker->unique()->safeEmail,
        'citizenship' => 1,
    ];
});
