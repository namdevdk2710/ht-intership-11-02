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

// Route::get('/', function () {
//     return view('welcome');
// });
/**
 * Frontend routes
 */
Route::namespace('V1\Web\frontend')->group(function () {
    Route::get('/', 'HomeController@index')->name('home');
    Route::get('/accommodation', 'RoomController@index')->name('room');
});


