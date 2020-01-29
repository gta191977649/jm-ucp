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
Route::get('/', 'HomeController@index')->name('home');

Route::get('login', 'JMLoginController@login')->name('login');
Route::post('login', 'JMLoginController@loginApi')->name('login.post');
Route::get('home', 'HomeController@index')->name('home');
Route::get('logout', 'JMLoginController@logout')->name('logout');
Route::get('account/nick', 'JMViewController@accountNickChangePage')->name('account.nickchange');
Route::get('account/pwd', 'JMViewController@accountPwdChangePage')->name('account.pwdchange');
Route::get('map/export', 'JMViewController@objectsPage')->name('map.export');

Route::post('api/nickchange', 'JMViewController@nickChange')->name('api.nickchange');
Route::post('api/pwdchange', 'JMViewController@pwdchange')->name('api.pwdchange');
Route::get('api/objects', 'JMViewController@apiObjectsPage')->name('api.objects.export');
