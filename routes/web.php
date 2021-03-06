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
Route::get('/lorem-ipsum', 'PageController@loremIpsum')->name('page.loremIpsum');
Route::post('/lorem-ipsum', 'PageController@loremIpsumPost')->name('page.loremIpsumPost');

//Random users generator page
Route::get('/random-user', 'PageController@randomUser')->name('page.randomUser');
Route::post('/random-user', 'PageController@randomUserPost')->name('page.randomUserPost');

//Random xkcd style password generator page
//Route::get('/password', 'PageController@password')->name('page.password');
Route::get('/random-password', 'PageController@randomPassword')->name('page.randomPassword');
Route::post('/random-password', 'PageController@randomPasswordPost')->name('page.randomPasswordPost');

//Permission generator page
Route::get('/permission-calculator', 'PageController@permissionCalculator')->name('page.permissionCalculator');
Route::post('/permission-calculator', 'PageController@permissionCalculatorPost')->name('page.permissionCalculatorPost');

//Contact page
Route::get('/contact', 'PageController@contact')->name('page.contact');
Route::post('/contact', 'PageController@contactPost')->name('page.contactPost');
