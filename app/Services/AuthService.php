<?php

namespace App\Services;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\ValidationException;

class AuthService
{
    public function register(array $input)
    {
        if (!isset($input['password'], $input['confirm_password'])) {
            throw new \InvalidArgumentException("Password and confirmation are required.");
        }

        if ($input['password'] !== $input['confirm_password']) {
            throw new \InvalidArgumentException("Password confirmation does not match.");
        }

        $input['password'] = Hash::make($input['password']);
        unset($input['confirm_password']);

        $user = User::create($input);
        $token = $user->createToken('auth_token')->plainTextToken;

        return [
            'user' => $user,
            'token' => $token
        ];
    }


    public function login(array $input)
    {
        $validator = Validator::make($input, [
            'user_id' => ['required', 'string', 'exists:users,user_id'],
            'password' => ['required'],
        ]);

        if ($validator->fails()) {
            throw ValidationException::withMessages($validator->errors()->toArray());
        }

        $credentials = $validator->validated();
        $user = User::where('user_id', $credentials['user_id'])->first();

        if (!$user || !Hash::check($credentials['password'], $user->password)) {
            throw ValidationException::withMessages([
                'user_id' => ['The provided credentials are incorrect.'],
            ]);
        }

        Auth::login($user);
        $token = $user->createToken('auth_token')->plainTextToken;

        return [
            'user' => $user->load(['spouse']),
            'token' => $token,
        ];
    }
}
