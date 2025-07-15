<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;

class UserController extends Controller
{
    public function update(Request $request)
    {
        $user = $request->user();
        $data = $request->all();

        if (!empty($data['date_of_birth'])) {
            $dob = Carbon::parse($data['date_of_birth']);
            $minAge = 17;

            if ($dob->diffInYears(Carbon::now()) < $minAge) {
                throw ValidationException::withMessages([
                    'error' => ['You must be at least 17 years old.'],
                ]);
            }
        }

        $user->fill($data);
        $user->save();

        return response()->json([
            'message' => 'Profile updated successfully.',
            'user' => $user->load(['spouse']),
        ]);
    }
}
