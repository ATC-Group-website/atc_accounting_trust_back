<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use App\Models\Apply;

class NewApplyMail extends Mailable
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
        $mail = $this->subject('New apply: ' . $this->apply->name)
            ->view('emails.new-apply')
            ->with([
                'apply' => $this->apply,
            ]);

        if ($this->apply->cv) {
            $mail->attachFromStorageDisk('public', $this->apply->cv);
        }

        return $mail;
    }
}
