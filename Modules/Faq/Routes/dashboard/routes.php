<?php

Route::group(['prefix' => 'faqs'], function () {
    Route::get('/', 'FaqController@index')
    ->name('dashboard.faqs.index')
    ->middleware(['permission:show_faqs']);

    Route::get('datatable', 'FaqController@datatable')
    ->name('dashboard.faqs.datatable')
    ->middleware(['permission:show_faqs']);

    Route::get('create', 'FaqController@create')
    ->name('dashboard.faqs.create')
    ->middleware(['permission:add_faqs']);

    Route::post('/', 'FaqController@store')
    ->name('dashboard.faqs.store')
    ->middleware(['permission:add_faqs']);

    Route::get('{id}/edit', 'FaqController@edit')
    ->name('dashboard.faqs.edit')
    ->middleware(['permission:edit_faqs']);

    Route::put('{id}', 'FaqController@update')
    ->name('dashboard.faqs.update')
    ->middleware(['permission:edit_faqs']);

    Route::delete('{id}', 'FaqController@destroy')
    ->name('dashboard.faqs.destroy')
    ->middleware(['permission:delete_faqs']);

    Route::get('deletes', 'FaqController@deletes')
    ->name('dashboard.faqs.deletes')
    ->middleware(['permission:delete_faqs']);

    Route::get('{id}', 'FaqController@show')
    ->name('dashboard.faqs.show')
    ->middleware(['permission:show_faqs']);
});
