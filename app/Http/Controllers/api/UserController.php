<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Services\Auth\AuthService;
use App\Models\User; // Assuming you have a User model
use App\Http\Requests\Auth\registerRequest; // Assuming you have a registerRequest for validation
use Illuminate\Http\JsonResponse;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    
    public function __construct(readonly AuthService $authservice)
    {

    }
    /**
     * Store a newly created resource in storage.
     */
    public function store(registerRequest $request): JsonResponse
    {
        $user = $this->authservice->register($request->validated());

        return response()->json(['data' => $user], 201);

    }
    /**
     * Login a user.
     */
    public function login(Request $request): JsonResponse
    {
        $user = $this->authservice->login($request->only('email', 'password'));
        if (!$user) {
            return response()->json(['message' => 'Invalid credentials'], 401);
        }
        return response()->json(['data' => $user], 200);
    }

    public function profile(Request $request)
    {
        return response()->json([
            'success' => true,
            'user' => $request->user(),
        ]);
    }
    /**
     * Logout the user.
     */
    public function logout(Request $request): JsonResponse
    {
        $this->authservice->logout($request->user());
        return response()->json(['message' => 'Logged out successfully'], 200);
    }
}
