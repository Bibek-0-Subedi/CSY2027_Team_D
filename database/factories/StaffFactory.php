<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Staff;
use Faker\Generator as Faker;

$factory->define(Staff::class, function (Faker $faker) {
    return [
        'assigned_id' => $faker->numberBetween(1,100),
        'status' => $faker->name,
        'firstname' => $faker->name,
        'middlename' => $faker->name,
        'surname' => $faker->name,
        'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi',
        'email' => $faker->unique()->safeEmail,
        'address' => $faker->address,
        'contact' => $faker->numberBetween(1,10000),
        'subject' => $faker->numberBetween(1,100),
        'role' => $faker->name
    ];
});
