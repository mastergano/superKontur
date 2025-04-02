<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

use App\Http\Controllers\ContactController;

// Маршрут для отображения формы
Route::get('/contact', 'ContactController@showForm')->name('contact.form');

// Маршрут для обработки отправки формы
Route::post('/contact', 'ContactController@store')->name('contact.store');
