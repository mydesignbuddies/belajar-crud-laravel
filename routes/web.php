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

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/', 'GuestController@index');
Route::post('/store', 'GuestController@store');
// Untuk Route dengan AJAX
// Route::delete('/delete/{id}', 'Guestcontroller@destroy');

// Untuk Route DELETE dengan PHP Native
Route::get('/delete/{id}', 'Guestcontroller@destroy');

// Untuk Route dengan PHP Native
// Route::get('/edit/{id}', 'Guestcontroller@edit');

// Untuk Route UPDATE dengan PHP Native
Route::get('/update/{id}', 'Guestcontroller@update');
