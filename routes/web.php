<?php

// Frontend routes
Route::group(['namespace' => 'V1\Web\frontend'], function () {
    Route::get('/', 'HomeController@index')->name('home');

    Route::get('/accommodation', 'RoomController@index')->name('room');
 });

// backend routes
Route::group(['prefix' => '/admin', 'namespace' => 'V1\Web\backend'], function () {
    Route::get('/home', function () {
        return view('backend.home.index');
    });

    Route::resource('/banner', 'BannerController');
});
