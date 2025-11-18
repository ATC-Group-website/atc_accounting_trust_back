<?php

namespace App\Listeners;

use App\Events\NewsletterSubscribed;
use App\Mail\NewsletterWelcomeMail;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Mail;

class SendNewsletterWelcomeEmail implements ShouldQueue
{
    use InteractsWithQueue;

    /**
     * Handle the event.
     */
    public function handle(NewsletterSubscribed $event): void
    {
        Mail::to($event->subscriber->email)
            ->send(new NewsletterWelcomeMail($event->subscriber));
    }
}
