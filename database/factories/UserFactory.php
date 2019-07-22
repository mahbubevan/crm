<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */
use App\User;
use App\Company;
use App\Employee;
use Illuminate\Support\Str;
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

$factory->define(User::class, function (Faker $faker) {
    static $password;
    return [
        'name' => $faker->name,
        'email' => $faker->unique()->safeEmail,
        'role' => 'moderator',
        'email_verified_at' => now(),
        'password' => $password ? :$password=bcrypt('secret'), // password
        'remember_token' => Str::random(10),
    ];
});

$factory->define(Company::class,function(Faker $faker){
    return[
        'name' => $faker->company,
        'email' => $faker->unique()->safeEmail,
    ];
});

$factory->define(Employee::class,function(Faker $faker){
    return[
        'first_name' => $faker->firstName,
        'last_name' => $faker->lastName,
        'phone' => $faker->phoneNumber,
        'email' => $faker->unique()->safeEmail,
        'company_id'=> 3,
    ];
});