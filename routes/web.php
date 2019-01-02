<?php

use Illuminate\Support\Facades\DB;

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
    $total = DB::table('ads')->count();
    return view('welcome', compact('total'));
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

/* Ads Routes */
Route::get('/annonces', 'adController@index')->name('ads.index');
Route::get('/annonce', 'AdController@create')->name('ads.create');
Route::post('/annonce', 'AdController@store')->name('ads.store');
Route::get('/annonce/{id}', 'AdController@show')->name('ads.show');

/* Searches Routes */
Route::patch('/search', 'SearchController@index')->name('search.index');

/* Contact Routes */
Route::get('/contact/{seller_id}/{ad_id}', 'ContactController@index')->name('contact.index');
Route::post('/contact', 'ContactController@store')->name('contact.store');
