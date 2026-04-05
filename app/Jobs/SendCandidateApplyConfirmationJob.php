<?php

namespace App\Jobs;

use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Queue\Queueable;
use App\Models\Apply;
use Illuminate\Support\Facades\Mail;
use App\Mail\CandidateApplyConfirmationMail;

class SendCandidateApplyConfirmationJob implements ShouldQueue
{
    use Queueable;

    public Apply $apply;

    /**
     * Create a new job instance.
     */
    public function __construct(Apply $apply)
    {
        $this->apply = $apply;

        // Set queue configuration.
        $this->onQueue('default');
    }

    /**
     * Execute the job.
     */
    public function handle(): void
    {
        Mail::to($this->apply->email)->send(new CandidateApplyConfirmationMail($this->apply));
    }
}
