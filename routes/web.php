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
    Route::resource('/gallery', 'GalleryController');
    Route::resource('/gallery_detail', 'GalleryDetailController');
    Route::resource('/module', 'ModuleController');
    Route::post('/module/changestatus', 'ModuleController@changestatus')->name('module.changestatus');
    Route::resource('/cuisine', 'CuisineController');
    Route::resource('/cuisine_detail', 'CuisineDetailController');
    Route::resource('/about', 'AboutController');
    Route::resource('/introduce', 'IntroduceController');
});
