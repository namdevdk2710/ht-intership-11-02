<?php

// Frontend routes
Route::group(['namespace' => 'V1\Web\frontend'], function () {
    Route::get('/', 'HomeController@index')->name('home.index');
    Route::get('/accommodation', 'RoomController@index')->name('room.index');
    Route::get('/gallery', 'GalleryDetailController@index')->name('gallery_detail.index');

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
    Route::resource('/facilitie', 'FacilitieController');
    Route::resource('/contact', 'ContactController');
    Route::post('/contact/changestatus', 'ContactController@changestatus')->name('contact.changestatus');
    Route::resource('/offer', 'OfferController');
    Route::resource('/destination', 'DestinationController');
    Route::resource('/facilitie_detail', 'FacilitieDetailController');
    Route::resource('/room', 'RoomController');
    Route::post('/room/changestatus', 'RoomController@changestatus')->name('room.changestatus');
    Route::resource('/user', 'UserController');
    Route::resource('/room_service', 'RoomServiceController');
});
