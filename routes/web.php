<?php

use Illuminate\Support\Facades\Route;

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
Auth::routes();
Route::get('/', 'SiteController@home')->name('home');
Route::get('/site/kamar', 'SiteController@kamar')->name('kamar');
Route::get('/site/kamar/{slug:slug}', 'SiteController@detail_kamar')->name('detail_kamar');


Route::group(['middleware' => ['auth', 'checkRole:admin']], function(){

	// Dashboard
	Route::get('/dasboard', 'DashboardController@index')->name('dashboard');
	// Dashboard Tamu
	Route::get('/dasboard/tamu/lengkap', 'TamuController@index')->name('daftar_tamu');
	Route::get('/dasboard/tamu/show/{id}', 'TamuController@show')->name('show_tamu');
	Route::delete('/dasboard/tamu/{id}', 'TamuController@destroy')->name('delete_tamu');
	// Dashboard Kamar
	Route::get('/dasboard/kamar', 'KamarController@index')->name('dashboard_kamar');
	Route::get('/dasboard/kamar/create', 'KamarController@create')->name('create_kamar');
	Route::post('/dasboard/kamar/store', 'KamarController@store')->name('store_kamar');
	Route::get('/dasboard/kamar/edit/{id}', 'KamarController@edit')->name('edit_kamar');
	Route::patch('/dasboard/kamar/update/{id}', 'KamarController@update')->name('update_kamar');
	Route::delete('/dasboard/kamar/destroy/{id}', 'KamarController@destroy')->name('destroy_kamar');

});

Route::group(['middleware' => ['auth', 'checkRole:tamu']], function(){
	
	// Profile
	Route::get('/profile', 'ProfileTamuController@index')->name('profile_tamu');
	Route::get('/profile/{id}', 'ProfileTamuController@edit')->name('edit_profile_tamu');
	Route::patch('/profile/{id}', 'ProfileTamuController@update')->name('update_profile_tamu');

});
