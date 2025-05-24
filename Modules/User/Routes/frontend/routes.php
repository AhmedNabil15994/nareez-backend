<?php

use Illuminate\Support\Facades\Route;

Route::group(['prefix' => 'profile' , 'middleware' => [ 'auth' ]], function () {
    Route::get('/', 'UserController@index')->name('frontend.profile.index');
    Route::post('/', 'UserController@update')->name('frontend.profile.update');
    Route::post('change-password', 'UserController@password')->name('frontend.profile.password');
    Route::get('my-courses', 'UserController@courses')->name('frontend.profile.courses');
    Route::get('my-orders', 'UserController@myOrders')->name('frontend.profile.orders');
    Route::get('my-events', 'UserController@events')->name('frontend.profile.events');
    Route::get('chat', 'MessageController@index')->name('frontend.message.index');
    Route::post('send-message', 'MessageController@sendMessage')->name('frontend.message.send');
    Route::get('calender', 'UserController@calender')->name('frontend.calender');
});
