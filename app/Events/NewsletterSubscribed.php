<?php

namespace App\Events;

use App\Models\NewsLetter;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class NewsletterSubscribed
{
    use Dispatchable;
    use SerializesModels;

    public function __construct(public NewsLetter $subscriber)
    {
    }
}
