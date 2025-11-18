<?php

namespace App\Jobs;

use App\Models\ContactusMails;
use App\Models\Inquiry;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Foundation\Queue\Queueable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;

class SendInquiryMail implements ShouldQueue
{
    use Queueable, Dispatchable, InteractsWithQueue, SerializesModels;

    /**
     * Create a new job instance.
     */
    public function __construct(public Inquiry $inquiry)
    {
        //
    }

    /**
     * Execute the job.
     */
    public function handle(): void
    {
        $recipientEmail = config('mail.temporary_mail_to') ?? config('mail.mail_to');
        $data = $this->inquiry->toArray();
        // Use Laravel's Mail facade to send an email
        \Mail::send('emails.contact_us', ['data' => $this->inquiry], function ($message) use ($data, $recipientEmail) {
            $message->from('noreply@atcaccountingtrust.com', $data['name'])
                ->to($recipientEmail)
                ->replyTo($data['email'])
                ->subject($data['reason_for_contact']);
        });
    }
}
