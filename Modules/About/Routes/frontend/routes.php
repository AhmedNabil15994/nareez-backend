<?php

use Illuminate\Support\Facades\Route;

Route::get('about-us', 'AboutUsController@aboutUs')->name('frontend.aboutUs.view');
