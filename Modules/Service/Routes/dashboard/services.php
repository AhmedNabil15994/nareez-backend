<?php

use Illuminate\Support\Facades\Route;

Route::name('dashboard.')->group(function () {
    Route::get('services/datatable', 'ServiceController@datatable')->name('services.datatable');

    Route::get('services/deletes', 'ServiceController@deletes')->name('services.deletes');

    Route::resource('services', 'ServiceController')->names('services');



    Route::get('serviceapplies/datatable', 'ServiceApplyController@datatable')
        ->name('serviceapplies.datatable');

    Route::get('serviceapplies/deletes', 'ServiceApplyController@deletes')
        ->name('serviceapplies.deletes');

    Route::resource('serviceapplies', 'ServiceApplyController')->names('serviceapplies');
});
