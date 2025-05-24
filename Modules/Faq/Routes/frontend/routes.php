<?php

use Illuminate\Support\Facades\Route;

Route::get('faqs', 'FaqController@index')->name('frontend.faqs.index');
