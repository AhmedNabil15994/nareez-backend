<?php

use Illuminate\Http\Request;

Route::post('/test', function (Request $request) {
    function generate_signature($api_key, $api_secret, $meeting_number, $role)
    {
        //Set the timezone to UTC
        date_default_timezone_set("UTC");
        $time = time() * 1000 - 30000;//time in milliseconds (or close enough)
        $data = base64_encode($api_key . $meeting_number . $time . $role);
        $hash = hash_hmac('sha256', $data, $api_secret, true);
        $_sig = $api_key . "." . $meeting_number . "." . $time . "." . $role . "." . base64_encode($hash);
        //return signature, url safe base64 encoded
        return rtrim(strtr(base64_encode($_sig), '+/', '-_'), '=');
    }


    $signature=
    generate_signature(
        env('ZOOM_API_KEY'),
        env('ZOOM_API_SECRET'),
        $request->meetingNumber,
        $request->role
    );



    return response()->json(['signature'=>$signature]);
});
