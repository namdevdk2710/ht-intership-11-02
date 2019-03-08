<?php

Route::pattern('id', '([0-9]*)');
Route::pattern('slug', '(.*)');
// Frontend routes
Route::group(['namespace' => 'V1\Web\frontend'], function () {
    Route::get('/', 'HomeController@index')->name('fe.home.index');
    Route::get('/accommodation', 'RoomController@index')->name('fe.room.index');
    Route::get('/accommodation/{slug}-{id}', 'RoomController@detail')->name('fe.room.detail');
    Route::get('/bookroom', 'RoomController@bookroom')->name('fe.room.bookroom');
    Route::get('/gallery', 'GalleryDetailController@index')->name('fe.gallery_detail.index');
    Route::get('/offer', 'OfferController@index')->name('fe.offer.index');
    Route::get('/offer/{slug}-{id}', 'OfferController@detail')->name('fe.offer.detail');
    Route::get('/cuisine', 'CuisineDetailController@index')->name('fe.cuisine_detail.index');
    Route::get('/facilitie', 'FacilitieDetailController@index')->name('fe.facilitie_detail.index');
    Route::get('/contact', 'ContactController@index')->name('fe.contact.index');
    Route::post('/contact', 'ContactController@store')->name('fe.contact.store');
    Route::get('/about/{slug}-{id}', 'HomeController@detailAbout')->name('fe.about.detail_about');
    Route::get('/destination', 'HomeController@getdestination')->name('fe.destination.getdestination');
    Route::get('/destination/{slug}-{id}', 'HomeController@getDestinationDetail')->name('fe.about.detail_destination');
});

// backend routes
Route::group(['prefix' => '/admin', 'namespace' => 'V1\Web\backend'], function () {
    Route::get('/', 'HomeController@index')->name('home.index');
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
