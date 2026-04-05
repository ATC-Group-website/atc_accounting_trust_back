<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use App\Models\Apply;

class CandidateApplyConfirmationMail extends Mailable
{
    use Queueable, SerializesModels;

    public Apply $apply;

    /**
     * Create a new message instance.
     */
    public function __construct(Apply $apply)
    {
        $this->apply = $apply;
    }

    /**
     * Build mail template.
     */
    public function build()
    {
        return $this->subject('Application Received: ' . $this->apply->name)
            ->view('emails.candidate-confirmation')
            ->with([
                'apply' => $this->apply,
            ]);
    }
}
