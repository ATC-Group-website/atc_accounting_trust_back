<?php

namespace App\Actions\Emails;

use App\Models\Inquiry;
use Exception;

class StoreInquiryAction
{
    public function handle(array $data): Inquiry
    {
        try {
            return Inquiry::create([
                'name' => $data['name'],
                'email' => $data['email'],
                'country' => $data['country'],
                'company_name' => $data['company_name'],
                'phone' => $data['phone'],
                'reason_for_contact' => $data['reason_for_contact'],
                'inquiry' => $data['inquiry'],
            ]);
        } catch (Exception $e) {
            throw $e;
        }
    }
}
