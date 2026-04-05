<?php

namespace App\Services\Interfaces;

interface ApplyInterface
{
    /**
     * Store candidate application.
     */
    public function store(array $data);

    /**
     * List all candidate applications.
     */
    public function index();
}
