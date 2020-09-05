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
Auth::routes([ 'verify' => true ]);
Route::get('/', 'SiteController@home')->name('home');
Route::post('/site/hotel', 'SiteController@hotel')->name('hotel');
Route::get('/site/hotel/{slug:slug}', 'SiteController@detail_hotel')->name('detail_hotel');
Route::get('/site/kamar/{slug:slug}', 'SiteController@detail_kamar')->name('detail_kamar');



Route::group(['middleware' => ['auth', 'checkRole:admin', 'verified']], function(){

	// Dashboard
	Route::get('/dasboard', 'DashboardController@index')->name('dashboard');
	
	// Dashboard Profile
	Route::get('/dasboard/profile', 'Account\ProfileAdminController@index')->name('profile_admin');
	Route::get('/dasboard/profile/{email:email}', 'Account\ProfileAdminController@edit')->name('edit_profile_admin');
	Route::patch('/dasboard/profile/{id}', 'Account\ProfileAdminController@update')->name('update_profile_admin');

	// Dashboard Tabel Tamu
	Route::get('/dasboard/tamu/', 'TamuController@index')->name('daftar_tamu');
	Route::get('/dasboard/tamu/check_in', 'TamuController@check_in_today')->name('daftar_check_in');
	Route::get('/dasboard/tamu/check_out', 'TamuController@check_out_today')->name('daftar_check_out');
	Route::get('/dasboard/tamu/{id}', 'TamuController@show')->name('show_tamu');
	Route::delete('/dasboard/tamu/{id}', 'TamuController@destroy')->name('delete_tamu');
	
	// Dashboard Category Hotel
	Route::get('/dasboard/category_hotel', 'CategoryHotelController@index')->name('dashboard_category_hotel');
	Route::get('/dasboard/category_hotel/create', 'CategoryHotelController@create')->name('create_category_hotel');
	Route::post('/dasboard/category_hotel/store', 'CategoryHotelController@store')->name('store_category_hotel');
	Route::get('/dasboard/category_hotel/{id}', 'CategoryHotelController@edit')->name('edit_category_hotel');
	Route::patch('/dasboard/category_hotel/{id}', 'CategoryHotelController@update')->name('update_category_hotel');
	Route::delete('/dasboard/category_hotel/{id}', 'CategoryHotelController@destroy')->name('destroy_category_hotel');

	// Dashboard Hotel
	Route::get('/dasboard/hotel', 'HotelController@index')->name('dashboard_hotel');
	Route::get('/dasboard/hotel/create', 'HotelController@create')->name('create_hotel');
	Route::post('/dasboard/hotel/store', 'HotelController@store')->name('store_hotel');
	Route::get('/dasboard/hotel/{id}', 'HotelController@edit')->name('edit_hotel');
	Route::patch('/dasboard/hotel/{id}', 'HotelController@update')->name('update_hotel');
	Route::delete('/dasboard/hotel/{id}', 'HotelController@destroy')->name('destroy_hotel');
	Route::get('/dasboard/hotel/show/{id}', 'HotelController@show')->name('show_hotel');


	// Dashboard Category Kamar
	Route::get('/dasboard/category_kamar', 'CategoryKamarController@index')->name('dashboard_category_kamar');
	Route::get('/dasboard/category_kamar/create', 'CategoryKamarController@create')->name('create_category_kamar');
	Route::post('/dasboard/category_kamar/store', 'CategoryKamarController@store')->name('store_category_kamar');
	Route::get('/dasboard/category_kamar/{id}', 'CategoryKamarController@edit')->name('edit_category_kamar');
	Route::patch('/dasboard/category_kamar/{id}', 'CategoryKamarController@update')->name('update_category_kamar');
	Route::delete('/dasboard/category_kamar/{id}', 'CategoryKamarController@destroy')->name('destroy_category_kamar');

	// Dashboard Kamar
	Route::get('/dasboard/kamar', 'KamarController@index')->name('dashboard_kamar');
	
	Route::get('/dasboard/kamar/{id}', 'KamarController@edit')->name('edit_kamar');
	Route::patch('/dasboard/kamar/{id}', 'KamarController@update')->name('update_kamar');
	Route::delete('/dasboard/kamar/{id}', 'KamarController@destroy')->name('destroy_kamar');
	Route::get('/dasboard/kamar/show/{id}', 'KamarController@show')->name('show_kamar');

});

Route::group(['middleware' => ['auth', 'checkRole:tamu', 'verified']], function(){
	
	// Profile
	Route::get('/profile', 'Account\ProfileTamuController@index')->name('profile_tamu');
	Route::get('/profile/password', 'Account\PasswordController@edit_tamu')->name('edit_password_tamu');
	Route::patch('/profile/password', 'Account\PasswordController@update_tamu')->name('update_password_tamu');
	Route::get('/profile/{email:email}', 'Account\ProfileTamuController@edit')->name('edit_profile_tamu');
	Route::patch('/profile/{id}', 'Account\ProfileTamuController@update')->name('update_profile_tamu');

	// history reservasi
	Route::get('/history/reservasi/{email:email}', 'ReservasiController@history_reservasi')->name('history_reservasi');
	// proses reservasi kamar
	Route::post('/reservasi/{id}', 'ReservasiController@create_reservasi')->name('reservasi');


});
