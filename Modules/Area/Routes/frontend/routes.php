<?php

Route::group(['prefix' => 'area'], function () {

    Route::get('get-child-area-by-parent',  function () {
        return response()->json();
    })->name('frontend.area.get_child_area_by_parent');
});
