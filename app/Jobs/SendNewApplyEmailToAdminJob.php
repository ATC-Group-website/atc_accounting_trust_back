<?php

namespace App\Jobs;

use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Queue\Queueable;
use App\Models\Apply;
use App\Models\EmailNotification;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;
use App\Mail\NewApplyMail;

class SendNewApplyEmailToAdminJob implements ShouldQueue
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
        $notifiables = EmailNotification::where('type', 'new_apply')->get();

        if ($notifiables->isEmpty()) {
            Log::info('No notifiables found for new apply');
            return;
        }

        foreach ($notifiables as $notification) {
            Mail::to($notification->email)->send(new NewApplyMail($this->apply));
        }
    }
}
