<?php

use Illuminate\Support\Facades\Route;

Route::get('podcasts', 'PodcastController@index')->name('frontend.podcasts.index');
