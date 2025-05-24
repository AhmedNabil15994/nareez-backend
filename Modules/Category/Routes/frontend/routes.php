<?php

Route::group(['prefix' => 'categories'], function () {
    Route::get('{slug}', 'CategoryController@show')->name('frontend.categories.show');
});
