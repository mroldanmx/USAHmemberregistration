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
    	'member_address_id' => function () {
            return factory(App\Models\Address::class)->create()->id;
        },
        'member_first_name' => $faker->firstName(strtolower($gender)),
        'member_last_name' => $faker->lastName,
        'member_gender' => $gender[0],
        'member_dob' => $faker->dateTime,
        'member_phone_1' => $faker->numerify('###-###-###'),
        'member_phone_2' => $faker->numerify('###-###-###'),
        'member_email' => $faker->unique()->safeEmail,
        'member_citizen' => 1,
    ];
});
