<?php

use Illuminate\Support\Facades\Route;

Route::group(['prefix' => 'podcasts'], function () {
    Route::get('/', 'PodcastController@index')
        ->name('dashboard.podcasts.index')
        ->middleware(['permission:show_podcasts']);

    Route::get('datatable', 'PodcastController@datatable')
        ->name('dashboard.podcasts.datatable')
        ->middleware(['permission:show_podcasts']);

    Route::get('create', 'PodcastController@create')
        ->name('dashboard.podcasts.create')
        ->middleware(['permission:add_podcasts']);

    Route::post('/', 'PodcastController@store')
        ->name('dashboard.podcasts.store')
        ->middleware(['permission:add_podcasts']);

    Route::get('{id}/edit', 'PodcastController@edit')
        ->name('dashboard.podcasts.edit')
        ->middleware(['permission:edit_podcasts']);

    Route::put('{id}', 'PodcastController@update')
        ->name('dashboard.podcasts.update')
        ->middleware(['permission:edit_podcasts']);

    Route::delete('{id}', 'PodcastController@destroy')
        ->name('dashboard.podcasts.destroy')
        ->middleware(['permission:delete_podcasts']);

    Route::get('deletes', 'PodcastController@deletes')
        ->name('dashboard.podcasts.deletes')
        ->middleware(['permission:delete_podcasts']);

    Route::get('{id}', 'PodcastController@show')
        ->name('dashboard.podcasts.show')
        ->middleware(['permission:show_podcasts']);
});

Route::group(['prefix' => 'clients'], function () {
    Route::get('/', 'ClientController@index')
        ->name('dashboard.clients.index')
        ->middleware(['permission:show_clients']);

    Route::get('datatable', 'ClientController@datatable')
        ->name('dashboard.clients.datatable')
        ->middleware(['permission:show_clients']);

    Route::get('create', 'ClientController@create')
        ->name('dashboard.clients.create')
        ->middleware(['permission:add_clients']);

    Route::post('/', 'ClientController@store')
        ->name('dashboard.clients.store')
        ->middleware(['permission:add_clients']);

    Route::get('{id}/edit', 'ClientController@edit')
        ->name('dashboard.clients.edit')
        ->middleware(['permission:edit_clients']);

    Route::put('{id}', 'ClientController@update')
        ->name('dashboard.clients.update')
        ->middleware(['permission:edit_clients']);

    Route::delete('{id}', 'ClientController@destroy')
        ->name('dashboard.clients.destroy')
        ->middleware(['permission:delete_clients']);

    Route::get('deletes', 'ClientController@deletes')
        ->name('dashboard.clients.deletes')
        ->middleware(['permission:delete_clients']);

    Route::get('{id}', 'ClientController@show')
        ->name('dashboard.clients.show')
        ->middleware(['permission:show_clients']);
});
