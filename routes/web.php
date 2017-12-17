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

Route::get('/', function () {
    return view('contact_ajax/welcome2');
});



Route::resource('post', 'PostController');


Route::resource('contact', 'ContactController');
Route::get('api/contact', 'ContactController@apiContact')->name('api.contact');