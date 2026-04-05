<?php

namespace App\Services\Implementations;

use App\Actions\Emails\SendEmailAction;
use App\Actions\Emails\StoreInquiryAction;
use App\Services\Interfaces\ContactusInterface;
use Exception;
use Illuminate\Support\Facades\DB;

class ContactusService implements ContactusInterface
{
    public function send(array $data): bool
    {
        DB::beginTransaction();
        try {
            $inquiry = app(StoreInquiryAction::class)->handle($data);
            if ($inquiry)
                app(SendEmailAction::class)->handle($inquiry);

            DB::commit();
            return true;
        } catch (Exception $e) {
            DB::rollBack();
            throw $e;
        }
    }
}
