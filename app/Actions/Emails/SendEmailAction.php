<?php

namespace App\Actions\Emails;

use App\Jobs\SendInquiryMail;
use App\Models\Inquiry;

class SendEmailAction
{
    public function handle(Inquiry $inquiry)
    {
        SendInquiryMail::dispatch($inquiry);
    }
}
