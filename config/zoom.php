<?php

return [
    'api_key' => env('ZOOM_API_KEY'),
    'api_secret' => env('ZOOM_API_SECRET'),
    'base_url' => env('ZOOM_API_URL'),
    'token_life' => 60 * 60 * 24 * 7, // In seconds, default 1 week
    'authentication_method' => 'jwt', // Only jwt compatible at present but will add OAuth2
    'max_api_calls_per_request' => '5',// how many times can we hit the api to return results for an all() request
    'approval_type'=>1,
    'audio'=>'both',
    'auto_recording'=>'none',


];
