<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Student;
use Faker\Generator as Faker;

$factory->define(Student::class, function (Faker $faker) {
    return [
        'assigned_id' => $faker->numberBetween(1,100),
        'status' => $faker->name,
        'firstname' => $faker->name,
        'middlename' => $faker->name,
        'surname' => $faker->name,
        'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi',
        'temporary_address' => $faker->address,
        'permanent_address' => $faker->address,
        'contact' => $faker->numberBetween(1,10000),
        'course_code' => $faker->numberBetween(1,100),
        'email' => $faker->unique()->safeEmail,
        'qualification' => $faker->name
    ];
});
