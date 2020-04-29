<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Produk;
use Faker\Generator as Faker;

$factory->define(Produk::class, function (Faker $faker) {

		$list_produk = [
    	'bayam',
    	'wortel',
    	'pupuk',
    	
    ];

    	$list_deskripsi = [
    	'tumbuhan yang biasa ditanam untuk dikonsumsi daunnya sebagai sayuran hijau',
    	'tumbuhan berwarna oranye biennial yang menyimpan karbohidrat dalam jumlah besar untuk tumbuhan tersebut berbunga pada tahun kedua',
    	'material yang ditambahkan pada media tanam atau tanaman untuk mencukupi kebutuhan hara yang diperlukan tanaman sehingga mampu berproduksi dengan baik.',
    	
    ];


    $list_harga = [
    	'2000',
    	'5000',
    	'25000',
    ];
	

    return [
    	'nama_produk' => $faker->randomElement($list_produk),
    	'deskripsi' => $faker->randomElement($list_deskripsi),
    	'harga' => $faker->randomElement($list_harga),
    	'image' => 'farm.png',
    	'kategori_id' => $faker->randomElement([1,2,3])
    ];
});
