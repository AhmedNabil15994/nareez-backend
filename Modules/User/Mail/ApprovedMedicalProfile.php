<?php

namespace Modules\User\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class ApprovedMedicalProfile extends Mailable
{
    use Queueable;
    use SerializesModels;

    /**
     * BoughtCourse constructor.
     * @param $course
     */
    public function __construct()
    {
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->markdown('user::emails.approved-medical-profile')->with(['url' => url('/')]);
    }
}
