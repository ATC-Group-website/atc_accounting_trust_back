<?php

namespace App\Services\Interfaces;

interface AdminAuthInterface
{
    /**
     * Register a new admin.
     */
    public function register(array $data);

    /**
     * Login admin.
     */
    public function login(array $data);

    /**
     * Logout admin.
     */
    public function logout();

    /**
     * List all admins.
     */
    public function index();
}
