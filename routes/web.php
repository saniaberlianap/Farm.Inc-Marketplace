<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('login');
});

Route::group(['middleware' => ['logged']], function(){

    Route::get('/login', 'HomeController@login')->name('login');

    Route::get('/register', 'HomeController@register' )->name('register');

    Route::post('signin', 'UserController@login');

    Route::post('/user/add', 'UserController@store');

});

Route::group(['middleware' => ['admin']], function(){


	Route::get('/dashboard', 'HomeController@dashboard')->name('dashboard');

    Route::get('/user/logout', 'UserController@logout');


	Route::resource('kategori', 'KategoriController');
	Route::get('kategori', ['as' => 'kategori.index', 'uses' => 'KategoriController@index']);
	Route::get('kategori/create', ['as' => 'kategori.create', 'uses' => 'KategoriController@create']);
	Route::post('kategori', ['as' => 'kategori.store', 'uses' => 'KategoriController@store']);
	Route::get('kategori/edit/{id}', ['as' => 'kategori.edit', 'uses' => 'KategoriController@edit']);
	Route::put('kategori/edit/{id}', ['as' => 'kategori.update', 'uses' => 'KategoriController@update']);
	Route::get('kategori/delete/{id}', ['as' => 'kategori.delete', 'uses' => 'KategoriController@delete']);


	Route::resource('produk', 'ProdukController');
	Route::get('produk', ['as' => 'produk.index', 'uses' => 'ProdukController@index']);
	Route::get('produk/create', ['as' => 'produk.create', 'uses' => 'ProdukController@create']);
	Route::post('produk', ['as' => 'produk.store', 'uses' => 'ProdukController@store']);
	Route::get('produk/edit/{id}', ['as' => 'produk.edit', 'uses' => 'ProdukController@edit']);
	Route::post('produk/edit/{id}', ['as' => 'produk.update', 'uses' => 'ProdukController@update']);
	Route::get('produk/delete/{id}', ['as' => 'produk.delete', 'uses' => 'ProdukController@delete']);


	Route::resource('pengguna', 'PenggunaController');
	Route::get('pengguna', ['as' => 'pengguna.index', 'uses' => 'PenggunaController@index']);
	Route::get('pengguna/create', ['as' => 'pengguna.create', 'uses' => 'PenggunaController@create']);
	Route::post('pengguna', ['as' => 'pengguna.store', 'uses' => 'PenggunaController@store']);
	Route::get('pengguna/edit/{id}', ['as' => 'pengguna.edit', 'uses' => 'PenggunaController@edit']);
	Route::post('pengguna/edit/{id}', ['as' => 'pengguna.update', 'uses' => 'PenggunaController@update']);
	Route::get('pengguna/delete/{id}', ['as' => 'pengguna.delete', 'uses' => 'PenggunaController@delete']);



	Route::resource('jual', 'JualController');
	Route::get('jual', ['as' => 'jual.index', 'uses' => 'JualController@index']);
	Route::get('jual/delete/{id}', ['as' => 'jual.delete', 'uses' => 'JualController@delete']);

 });

    





