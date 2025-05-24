<?php

use Illuminate\Support\Facades\Route;

Route::name('dashboard.')->group(function () {
    Route::get('abouttypes/datatable', 'AboutTypeController@datatable')
    ->name('abouttypes.datatable');

    Route::get('abouttypes/deletes', 'AboutTypeController@deletes')
    ->name('abouttypes.deletes');

    Route::resource('abouttypes', 'AboutTypeController')->names('abouttypes');



    Route::get('abouts/datatable', 'AboutController@datatable')
    ->name('abouts.datatable');

    Route::get('abouts/deletes', 'AboutController@deletes')
    ->name('abouts.deletes');

    Route::resource('abouts', 'AboutController')->names('abouts');


    Route::get('order/abouttypes/drag-drop', 'AboutTypeController@viewOrder')->name('order.abouttypes.index');

    Route::post('order/abouttypes/drag-drop', 'AboutTypeController@orderTypes')->name('order.abouttypes');
});
