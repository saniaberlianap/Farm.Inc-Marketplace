<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Pengguna;
use Faker\Generator as Faker;

$factory->define(Pengguna::class, function (Faker $faker) {
    return [
        'nama' => $faker->name,
        'email' => $faker->unique()->safeEmail,
        'password' => 'password',           // password
        'alamat' => $faker->address,
        'nohp' => $faker->phoneNumber
    ];
});
