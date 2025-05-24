<?php

use Illuminate\Support\Facades\Route;

Route::name('dashboard.')->group(function () {
    Route::get('memberships/datatable', 'MembershipController@datatable')
        ->name('memberships.datatable');

    Route::get('memberships/deletes', 'MembershipController@deletes')
        ->name('memberships.deletes');

    Route::resource('memberships', 'MembershipController')->names('memberships');
});
