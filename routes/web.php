<?php

// Frontend routes
Route::namespace('V1\Web\frontend')->group(function () {
    Route::get('/', 'HomeController@index')->name('home');
    Route::get('/accommodation', 'RoomController@index')->name('room');
});
