<?php

namespace App\Services\Interfaces;

interface NewsLetterInterface
{
    public function subscribe(string $email): bool;

    public function unsubscribe(string $email): bool;
}
