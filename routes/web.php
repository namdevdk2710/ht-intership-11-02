<?php

Route::pattern('id', '([0-9]*)');
Route::pattern('slug', '(.*)');
// Frontend routes
Route::group(['namespace' => 'V1\Web\frontend'], function () {
    Route::get('/', 'HomeController@index')->name('fe.home.index');
    Route::get('/accommodation', 'RoomController@index')->name('fe.room.index');
    Route::get('/gallery', 'GalleryDetailController@index')->name('fe.gallery_detail.index');
    Route::get('/offer', 'OfferController@index')->name('fe.offer.index');
    Route::get('/offer/{slug}-{id}', 'OfferController@detail')->name('fe.offer.detail');
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
