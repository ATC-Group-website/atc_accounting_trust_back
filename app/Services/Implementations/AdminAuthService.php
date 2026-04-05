<?php

namespace App\Services\Implementations;

use App\Models\User;
use App\Services\Interfaces\AdminAuthInterface;
use App\Traits\ResponseTrait;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;

class AdminAuthService implements AdminAuthInterface
{
    use ResponseTrait;

    /**
     * Register a new admin.
     */
    public function register(array $data)
    {
        try {
            $user = User::create([
                'name' => $data['name'],
                'email' => $data['email'],
                'password' => Hash::make($data['password']),
                'role' => 'admin',
            ]);

            $token = $user->createToken('admin-token')->plainTextToken;

            return $this->success201([
                'user' => $user,
                'token' => $token
            ], 'Admin registered successfully');

        } catch (\Exception $e) {
            Log::error('Admin registration failed', ['error' => $e->getMessage()]);
            return $this->error500($e->getMessage(), 'Failed to register admin');
        }
    }

    /**
     * Login admin.
     */
    public function login(array $data)
    {
        try {
            $user = User::where('email', $data['email'])->where('role', 'admin')->first();

            if (!$user || !Hash::check($data['password'], $user->password)) {
                return $this->error401('Invalid credentials', 'Login failed');
            }

            $token = $user->createToken('admin-token')->plainTextToken;

            return $this->success200([
                'user' => $user,
                'token' => $token
            ], 'Login successful');

        } catch (\Exception $e) {
            Log::error('Admin login failed', ['error' => $e->getMessage()]);
            return $this->error500($e->getMessage(), 'Internal server error during login');
        }
    }

    /**
     * Logout admin.
     */
    public function logout()
    {
        try {
            $user = Auth::user();
            if ($user) {
                $user->currentAccessToken()->delete();
            }

            return $this->success200(null, 'Logged out successfully');

        } catch (\Exception $e) {
            Log::error('Admin logout failed', ['error' => $e->getMessage()]);
            return $this->error500($e->getMessage(), 'Failed to logout');
        }
    }

    /**
     * List all admins.
     */
    public function index()
    {
        try {
            $admins = User::where('role', 'admin')->latest()->get();
            return $this->success200($admins, 'Admins retrieved successfully');

        } catch (\Exception $e) {
            Log::error('Failed to retrieve admins', ['error' => $e->getMessage()]);
            return $this->error500($e->getMessage(), 'Failed to retrieve admins');
        }
    }
}
