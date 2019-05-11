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

Route::get('/register', 'Web\Auth\AuthController@register')->name('register');
Route::post('/register', 'Web\Auth\AuthController@register_post')->name('register');
Route::post('/login', 'Web\Auth\AuthController@login_post')->name('login');
Route::get('/logout', 'Web\Auth\AuthController@logout')->name('logout');
