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

//Route::get('/', function () {
//    return view('welcome');
//});

Auth::routes();
Route::resource('ads', 'AdsController');
Route::resource('users', 'UsersController');

Route::get('/', 'AdsController@index')->name('ads');
Route::get('create', 'AdsController@create')->name('create_ad');
Route::get('{ad}', 'AdsController@show')->name('show_ad');
Route::get('{ad}/edit', 'AdsController@edit')->name('edit_ad');
Route::post('loginOrRegister', 'Auth\LoginController@loginOrRegister')->name('loginOrRegister');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
