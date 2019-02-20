<?php

// Frontend routes
Route::namespace('V1\Web\frontend')->group(function () {
    Route::get('/', 'HomeController@index')->name('home');
    Route::get('/accommodation', 'RoomController@index')->name('room');
});
// backend routes
Route::get('admin/home', function () {
    return view('backend.home.index');
});


Route::namespace('V1\Web\backend')->group(function () {
    Route::group(['prefix' => '/admin'], function () {
        Route::resource('/banner', 'BannerController');
    });
});
