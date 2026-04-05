<?php

namespace App\Services\Implementations;

use App\Events\NewsletterSubscribed;
use App\Models\NewsLetter;
use App\Services\Interfaces\NewsLetterInterface;

class NewsLetterService implements NewsLetterInterface
{
    public function subscribe(string $email): bool
    {
        $newsLetter = NewsLetter::create(['email' => $email]);
        if (!$newsLetter) {
            return false;
        }

        NewsletterSubscribed::dispatch($newsLetter);
        return true;
    }

    public function unsubscribe(string $email): bool
    {
        return NewsLetter::where('email', $email)->delete();
    }
}
