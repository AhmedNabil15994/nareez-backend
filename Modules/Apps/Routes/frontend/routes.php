<?php

use Illuminate\Support\Facades\Route;

Route::get('/', 'HomeController@index')->name('frontend.home');



Route::get('contact-us', 'ContactUsController@contactUs')->name('frontend.contactus.view');
Route::post('contact-us', 'ContactUsController@sendContactUs')->name('frontend.contactus');
Route::post('Subscribe', 'FrontendController@subscribe')->name('frontend.subscribe');
