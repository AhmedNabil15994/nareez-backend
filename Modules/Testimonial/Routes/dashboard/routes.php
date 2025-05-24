<?php

Route::group(['prefix' => 'testimonials'], function () {
    Route::get('/', 'TestimonialController@index')
        ->name('dashboard.testimonials.index')
        ->middleware(['permission:show_testimonials']);

    Route::get('datatable', 'TestimonialController@datatable')
        ->name('dashboard.testimonials.datatable')
        ->middleware(['permission:show_testimonials']);

    Route::get('create', 'TestimonialController@create')
        ->name('dashboard.testimonials.create')
        ->middleware(['permission:add_testimonials']);

    Route::post('/', 'TestimonialController@store')
        ->name('dashboard.testimonials.store')
        ->middleware(['permission:add_testimonials']);

    Route::get('{id}/edit', 'TestimonialController@edit')
        ->name('dashboard.testimonials.edit')
        ->middleware(['permission:edit_testimonials']);

    Route::put('{id}', 'TestimonialController@update')
        ->name('dashboard.testimonials.update')
        ->middleware(['permission:edit_testimonials']);

    Route::delete('{id}', 'TestimonialController@destroy')
        ->name('dashboard.testimonials.destroy')
        ->middleware(['permission:delete_testimonials']);

    Route::get('deletes', 'TestimonialController@deletes')
        ->name('dashboard.testimonials.deletes')
        ->middleware(['permission:delete_testimonials']);

    Route::get('{id}', 'TestimonialController@show')
        ->name('dashboard.testimonials.show')
        ->middleware(['permission:show_testimonials']);
});
