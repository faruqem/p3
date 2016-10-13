<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of the routes that are handled
| by your application. Just tell Laravel the URIs it should respond
| to using a Closure or controller method. Build something great!
|
*/

//Home page
Route::get('/', 'PageController@home')->name('page.home');

//Lorem Ipsum text generator page
Route::get('/loremipsum', 'PageController@loremipsum')->name('page.loremipsum');

//Random users generator page
Route::get('/user', 'PageController@user')->name('page.user');

//Random xkcd style password generator page
//Route::get('/password', 'PageController@password')->name('page.password');
Route::get('/password', 'PageController@password')->name('page.password');

//Permission generator page
Route::get('/permission', 'PageController@permission')->name('page.permission');

//Contact page
Route::get('/contact', 'PageController@contact')->name('page.contact');
