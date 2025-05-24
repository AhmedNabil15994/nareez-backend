<?php

use Illuminate\Support\Facades\Route;



Route::group(['as' => 'developer.'], function () {
    Route::middleware(['dashboard.auth', 'permission:dashboard_access'])
        ->group(function () {
            //theme colors
            Route::group(['prefix' => 'themes', 'as' => 'themes.', 'namespace' => 'Themes'], function () {
                Route::group(['prefix' => 'colors', 'as' => 'colors.'], function () {
                    Route::get('/', 'ColorController@index')->name('index');
                    Route::put('/', 'ColorController@update')->name('update');
                });
            });
        });
    //////////////////////////////////////////////////
});
