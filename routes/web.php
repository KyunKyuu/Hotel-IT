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
Route::get('/hotel/', 'SiteController@hotel')->name('hotel');
Route::get('/hotel/city/', 'SiteController@hotel_city')->name('hotel_city');
Route::get('/hotel/popular', 'SiteController@popular')->name('popular');
Route::get('/hotel/{slug:slug}', 'SiteController@detail_hotel')->name('detail_hotel');
Route::get('/about', 'SiteController@about')->name('about');
Route::get('/contact', 'SiteController@contact_us')->name('contact');
Route::post('/contact', 'ContactUsController@contact_send')->name('contact_send');

Route::group(['middleware' => ['auth', 'checkRole:superadmin', 'verified']], function(){


	Route::get('/dasboard/admin', 'AdminController@index')->name('daftar_admin');
	Route::get('/dasboard/admin/create', 'AdminController@create')->name('create_admin');
	Route::post('/dasboard/admin/store', 'AdminController@store')->name('store_admin');
	// Route::get('/dasboard/admin/{id}', 'AdminController@edit')->name('edit_admin');
	// Route::patch('/dasboard/admin/{id}', 'AdminController@update')->name('update_admin');
	Route::get('/dasboard/admin/show/{id}', 'AdminController@show')->name('show_admin');
	Route::delete('/dasboard/admin/{id}', 'AdminController@destroy')->name('destroy_admin');
	Route::get('/dasboard/admin/remove/{id}', 'AdminController@remove')->name('remove_admin');

	// Tamu
	Route::delete('/dasboard/tamu/{id}', 'TamuController@destroy')->name('delete_tamu');

	// Dashboard Category Hotel
	Route::get('/dasboard/category_hotel', 'CategoryHotelController@index')->name('dashboard_category_hotel');
	Route::get('/dasboard/category_hotel/create', 'CategoryHotelController@create')->name('create_category_hotel');
	Route::post('/dasboard/category_hotel/store', 'CategoryHotelController@store')->name('store_category_hotel');
	Route::get('/dasboard/category_hotel/{id}', 'CategoryHotelController@edit')->name('edit_category_hotel');
	Route::patch('/dasboard/category_hotel/{id}', 'CategoryHotelController@update')->name('update_category_hotel');
	Route::delete('/dasboard/category_hotel/{id}', 'CategoryHotelController@destroy')->name('destroy_category_hotel');
	
});

Route::group(['middleware' => ['auth', 'checkRole:admin', 'verified']], function(){

	// Dasboard Hotel
	Route::get('/dasboard/hotel/create', 'HotelController@create')->name('create_hotel');
	Route::post('/dasboard/hotel/store', 'HotelController@store')->name('store_hotel');
	Route::get('/dasboard/hotel/{slug:slug}', 'HotelController@edit')->name('edit_hotel');
	Route::patch('/dasboard/hotel/{id}', 'HotelController@update')->name('update_hotel');

	// Dashboard Category Kamar
	Route::get('/dasboard/category_kamar/create', 'CategoryKamarController@create')->name('create_category_kamar');
	Route::post('/dasboard/category_kamar/store', 'CategoryKamarController@store')->name('store_category_kamar');
	Route::get('/dasboard/category_kamar/{id}', 'CategoryKamarController@edit')->name('edit_category_kamar');
	Route::patch('/dasboard/category_kamar/{id}', 'CategoryKamarController@update')->name('update_category_kamar');

	// Dashboard Diskon
	Route::post('/dasboard/diskon/create', 'DiskonController@store')->name('store_diskon');
	Route::get('/dasboard/diskon/{id}', 'DiskonController@edit')->name('edit_diskon');
	Route::patch('/dasboard/diskon/{id}', 'DiskonController@update')->name('update_diskon');




});

Route::group(['middleware' => ['auth', 'checkRole:admin,superadmin', 'verified']], function(){

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
	

	// Dashboard Hotel
	Route::get('/dasboard/hotel', 'HotelController@index')->name('dashboard_hotel');
	Route::get('/dasboard/hotel/show/{slug:slug}', 'HotelController@show')->name('show_hotel');
	Route::delete('/dasboard/hotel/{id}', 'HotelController@destroy')->name('destroy_hotel');


	// Dashboard Category Kamar
	Route::get('/dasboard/category_kamar', 'CategoryKamarController@index')->name('dashboard_category_kamar');
	Route::delete('/dasboard/category_kamar/{id}', 'CategoryKamarController@destroy')->name('destroy_category_kamar');
	Route::get('/dasboard/category_kamar/show/{slug:slug}', 'CategoryKamarController@show')->name('show_kamar');

	// Dashboard Diskon Kamar
	Route::get('/dasboard/diskon', 'DiskonController@index')->name('diskon_kamar');
	Route::get('/dasboard/diskon/show/{id}', 'DiskonController@show')->name('show_diskon');
	Route::delete('/dasboard/diskon/{id}', 'DiskonController@destroy')->name('destroy_diskon');

	// Riwayat Reservasi
	Route::get('/dasboard/history/reservasi', 'DashboardController@history_reservasi')->name('history_reservasi');


});

Route::group(['middleware' => ['auth', 'checkRole:tamu', 'verified']], function(){
	
	// Profile
	Route::get('/profile', 'Account\ProfileTamuController@index')->name('profile_tamu');
	Route::get('/profile/password', 'Account\PasswordController@edit_tamu')->name('edit_password_tamu');
	Route::patch('/profile/password', 'Account\PasswordController@update_tamu')->name('update_password_tamu');
	Route::get('/profile/{email:email}', 'Account\ProfileTamuController@edit')->name('edit_profile_tamu');
	Route::patch('/profile/{id}', 'Account\ProfileTamuController@update')->name('update_profile_tamu');

	// history reservasi
	Route::get('/review/{email:email}', 'ReviewController@index')->name('review');
	Route::post('/hotel/review', 'ReviewController@review')->name('hotel_review');
	// proses reservasi kamar
	Route::get('/reservasi', 'ReservasiController@reservasi_awal')->name('reservasi');
	Route::post('/reservasi/store', 'ReservasiController@reservasi_akhir')->name('reservasi_order');

	// Reservasi Diskon
	Route::get('/reservasi/order/diskon', 'ReservasiController@apply_diskon')->name('apply_diskon');
	Route::delete('reservasi/order/diskon', 'ReservasiController@delete_diskon')->name('delete_diskon');
	// whislist
	Route::get('/whislist/{emai:email}','whislistController@show')->name('whislist');
	Route::get('/create/whislist/{id}', 'whislistController@create')->name('create_whislist');
	Route::delete('/whislist/{id}', 'whislistController@destroy')->name('destroy_whislist');
	Route::delete('/whislist_all/{id}', 'whislistController@destroy_all')->name('destroy_all_whislist');

	// midtrans
	Route::post('/midtrans/callback', 'MidtransController@notificationHandler');
	Route::get('/midtrans/finish', 'MidtransController@finishRedirect');
	Route::get('/midtrans/unfinish', 'MidtransController@unfinishRedirect');
	Route::get('/midtrans/error', 'MidtransController@errorRedirect');

});
