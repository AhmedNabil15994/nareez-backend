<?php

use Illuminate\Support\Facades\Route;

Route::group(['prefix' => 'p'], function () {

    // Route::get('about-us' ,'PageController@aboutUs')
    //     ->name('frontend.pages.about_us');

    Route::get('{slug}', 'PageController@show')
        ->name('frontend.pages.show');
});
