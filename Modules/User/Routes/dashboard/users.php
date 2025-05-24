<?php

use Illuminate\Support\Facades\Route;

Route::name('dashboard.')->group(function () {
    Route::get('users/datatable', 'UserController@datatable')
        ->name('users.datatable');

    Route::get('users/deletes', 'UserController@deletes')
        ->name('users.deletes');

    Route::resource('users', 'UserController')->names('users');
});
