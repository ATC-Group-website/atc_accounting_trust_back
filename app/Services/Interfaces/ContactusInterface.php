<?php

namespace App\Services\Interfaces;

interface ContactusInterface
{
    public function send(array $data): bool;
}
