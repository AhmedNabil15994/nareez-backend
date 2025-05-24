<?php

use Illuminate\Http\Request;

Route::any("generate_signature", function (Request $request) {
    $api_key = "tVz3a_z6SryzcPAdky6_vw";
    $api_secret="wTGIY7ewVPTWstjAmDaGOVCNhBaRcK4qHpnF";
    return response(["signature"=> generate_signature(
        $api_key,
        $api_secret,
        $request->meetingNumber,
        $request->role
    )]);
})->name("frontend.api.generate");
