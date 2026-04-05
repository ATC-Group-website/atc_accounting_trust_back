<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\NewsletterRequest;
use App\Services\Interfaces\NewsLetterInterface;
use Illuminate\Http\JsonResponse;

class NewsletterController extends Controller
{
    public function __construct(private NewsLetterInterface $newsLetterService) {}

    public function subscribe(NewsletterRequest $request): JsonResponse
    {
        $newsLetter = $this->newsLetterService->subscribe($request->string('email'));
        if (! $newsLetter) {
            return response()->json(['message' => 'Newsletter subscription failed'], 400);
        }

        return response()->json(['message' => 'Newsletter subscribed successfully'], 200);
    }

    public function unsubscribe(NewsletterRequest $request): JsonResponse
    {
        $newsLetter = $this->newsLetterService->unsubscribe($request->string('email'));
        if (! $newsLetter) {
            return response()->json(['message' => 'Newsletter unsubscription failed'], 400);
        }

        return response()->json(['message' => 'Newsletter unsubscribed successfully'], 200);
    }
}
