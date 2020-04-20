<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Kategori;
use Faker\Generator as Faker;

$factory->define(Kategori::class, function (Faker $faker) {

	$listKategori = [
            'Fresh', 
            'Sayur',
            'Buah', 
            ];

    return [
         'jenis' => $faker->unique()->randomElement($listKategori)
    ];
});
