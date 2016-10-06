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
/*
Route::get('/', function () {
    return view('welcome');
});
*/
//Home page
Route::get('/', 'HomeController@index')->name('home.index');

//Lorem Ipsum text generator page
Route::get('/loremipsum', 'LoremIpsumController@index')->name('loremipsums.index');
Route::post('/loremipsum', 'LoremIpsumController@create')->name('loremipsums.create');

//Random users generator page
Route::get('/user', 'UserController@index')->name('users.index');
Route::post('/user', 'UserController@create')->name('users.create');

//Random xkcd style password generator page
Route::get('/password', 'PasswordController@index')->name('passwords.index');
Route::post('/password', 'PasswordController@create')->name('passwords.create');

//Permission generator page
Route::get('/permission', 'PermissionController@index')->name('permissions.index');
Route::post('/permission', 'PermissionController@create')->name('permissions.create');

//Contact page
Route::get('/contact', 'ContactController@index')->name('contacts.index');
