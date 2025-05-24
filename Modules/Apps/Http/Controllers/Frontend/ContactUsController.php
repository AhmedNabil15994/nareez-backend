<?php

namespace Modules\Apps\Http\Controllers\Frontend;

use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Notification;
use Modules\Apps\Notifications\FrontEnd\ContactUsNotification;
use Modules\Apps\Http\Controllers\Requests\Frontend\ContactUsRequest;

class ContactUsController extends Controller
{
    public function contactUs()
    {
        return view('apps::frontend.contact-us');
    }

    public function sendContactUs(ContactUsRequest $request)
    {
        Notification::route('mail', setting('contact_us', 'email'))
           ->notify((new ContactUsNotification($request))->locale(locale()));

        return response()
                ->json(
                    [true ,
                     __('Message Sent Successfully And We Will Contact you')
                    ]
                );
    }
}
