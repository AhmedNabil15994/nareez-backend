<?php

use Illuminate\Support\Facades\Route;

Route::group(['prefix' => 'services'], function () {
    Route::get('/apply', 'ServiceController@serviceApply')->name('frontend.services.apply.form');
    Route::post('/apply', 'ServiceController@sendServiceApply')->name('frontend.services.apply');
});
