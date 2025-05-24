<?php

use Illuminate\Support\Facades\Route;

Route::name('dashboard.')->group(function () {
    Route::get('admins/datatable', 'AdminController@datatable')
        ->name('admins.datatable');

    Route::get('admins/deletes', 'AdminController@deletes')
        ->name('admins.deletes');

    Route::resource('admins', 'AdminController')->names('admins');

    Route::get('threads/datatable', 'ThreadController@datatable')
        ->name('threads.datatable');

    Route::get('threads/deletes', 'ThreadController@deletes')
        ->name('threads.deletes');

    Route::resource('threads', 'ThreadController')->names('threads');
    Route::get('message/users/threads', 'ThreadController@sendMessageForm')->name('threads.send_message_to_users');
    Route::post('message/users/threads', 'ThreadController@sendMessageStore')->name('threads.send_message_to_users.post');
});
