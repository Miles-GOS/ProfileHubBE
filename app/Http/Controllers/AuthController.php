<?php

namespace App\Http\Controllers;

use App\Services\AuthService;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;

class AuthController extends Controller
{
    protected $authService;

    public function __construct(AuthService $authService)
    {
        $this->authService = $authService;
    }

    public function register(Request $request)
    {
        try {
            $result = $this->authService->register($request->all());

            return response()->json([
                'message' => 'User registered successfully.',
                'access_token' => $result['token'],
                'token_type' => 'Bearer',
                'user' => $result['user'],
            ], 201);
        } catch (ValidationException $e) {
            return response()->json(['errors' => $e->errors()], 422);
        }
    }

    public function login(Request $request)
    {
        $result = $this->authService->login($request->all());

        return response()->json([
            'message' => 'Login successful.',
            'user' => $result['user'],
            'access_token' => $result['token'],
        ], 200);
    }

    public function logout(Request $request)
    {
        $request->user()->currentAccessToken()->delete();

        return response()->json(['message' => 'Logged out successfully']);
    }

    public function me(Request $request)
    {
        return response()->json([
            'user' => $request->user()->load(['spouse']),
        ]);
    }
}
