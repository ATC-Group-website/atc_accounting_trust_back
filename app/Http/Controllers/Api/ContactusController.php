<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\SendInquiryRequest;
use App\Services\Interfaces\ContactusInterface;
use Illuminate\Http\JsonResponse;

class ContactusController extends Controller
{
    public function __construct(protected ContactusInterface $contactusService)
    {
    }
    public function send(SendInquiryRequest $request): JsonResponse
    {
        $isSent = $this->contactusService->send($request->validated());
        if ($isSent == false) {
            return response()->json('err while sending newsletter', 500);
        }
        return response()->json('Mail sent succefully');
    }
}
