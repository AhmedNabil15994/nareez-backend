<?php

use Illuminate\Support\Facades\Route;

//use Vsch\TranslationManager\Translator;


Route::group(['prefix' => '/', 'middleware' => ['dashboard.auth', 'permission:dashboard_access']], function () {
    Route::get('/', 'DashboardController@index')->name('dashboard.home');

    //  Route::group(['prefix' => 'translations'], function () {
    ////      Translator::routes();
    //  });

    Route::get('logs', '\Rap2hpoutre\LaravelLogViewer\LogViewerController@index');
});



Route::name('dashboard.')->group(function () {
    Route::get('subscribes/datatable', 'SubscribeController@datatable')
        ->name('subscribes.datatable');

    Route::get('subscribes/deletes', 'SubscribeController@deletes')
        ->name('subscribes.deletes');

    Route::get('subscribes/', 'SubscribeController@index')->name('subscribe.index');
    Route::delete('subscribes/{id}', 'SubscribeController@destroy')->name('subscribes.destroy');



    Route::get('homepagesectiontypes/datatable', 'HomepageSectionTypeController@datatable')
        ->name('homepagesectiontypes.datatable');

    Route::get('homepagesectiontypes/deletes', 'HomepageSectionTypeController@deletes')
        ->name('homepagesectiontypes.deletes');

    Route::resource('homepagesectiontypes', 'HomepageSectionTypeController')->names('homepagesectiontypes');

    Route::get('homepagesections/datatable', 'HomepageSectionController@datatable')
        ->name('homepagesections.datatable');

    Route::get('homepagesections/deletes', 'HomepageSectionController@deletes')
        ->name('homepagesections.deletes');

    Route::resource('homepagesections', 'HomepageSectionController')->names('homepagesections');
    Route::get('order/homepagesectiontypes/drag-drop', 'HomepageSectionTypeController@viewOrder')->name('order.homepagesectiontypes.index');

    Route::post('order/homepagesectiontypes/drag-drop', 'HomepageSectionTypeController@orderTypes')->name('order.homepagesectiontypes');
});









Route::group(['prefix' => 'app-homes'], function () {

    Route::get('/', 'AppHomeController@index')
        ->name('dashboard.apphomes.index')
        ->middleware(['permission:show_apphomes']);

    Route::get('datatable', 'AppHomeController@datatable')
        ->name('dashboard.apphomes.datatable')
        ->middleware(['permission:show_apphomes']);

    Route::get('create', 'AppHomeController@create')
        ->name('dashboard.apphomes.create')
        ->middleware(['permission:add_apphomes']);

    Route::post('/', 'AppHomeController@store')
        ->name('dashboard.apphomes.store')
        ->middleware(['permission:add_apphomes']);

    Route::get('{id}/edit', 'AppHomeController@edit')
        ->name('dashboard.apphomes.edit')
        ->middleware(['permission:edit_apphomes']);

    Route::put('{id}', 'AppHomeController@update')
        ->name('dashboard.apphomes.update')
        ->middleware(['permission:edit_apphomes']);

    Route::delete('{id}', 'AppHomeController@destroy')
        ->name('dashboard.apphomes.destroy')
        ->middleware(['permission:delete_apphomes']);

    Route::get('deletes', 'AppHomeController@deletes')
        ->name('dashboard.apphomes.deletes')
        ->middleware(['permission:delete_apphomes']);

    Route::get('{id}', 'AppHomeController@show')
        ->name('dashboard.apphomes.show')
        ->middleware(['permission:show_apphomes']);
});
