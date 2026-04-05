<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Services\Interfaces\AdminAuthInterface;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class AdminAuthController extends Controller
{
    protected $adminAuthService;

    public function __construct(AdminAuthInterface $adminAuthService)
    {
        $this->adminAuthService = $adminAuthService;
    }

    /**
     * Register a new admin.
     */
    public function register(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|string|min:8|confirmed',
        ]);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 422);
        }

        return $this->adminAuthService->register($request->only('name', 'email', 'password'));
    }

    /**
     * Login admin.
     */
    public function login(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'email' => 'required|email',
            'password' => 'required|string',
        ]);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 422);
        }

        return $this->adminAuthService->login($request->only('email', 'password'));
    }

    /**
     * Logout admin.
     */
    public function logout()
    {
        return $this->adminAuthService->logout();
    }

    /**
     * List all admins.
     */
    public function index()
    {
        return $this->adminAuthService->index();
    }
}
