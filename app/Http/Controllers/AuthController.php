<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function login(Request $request)
    {
        $user = User::where('EmailNV', $request->EmailNV)->first();

        if (!$user || !Hash::check($request->PasswordNV, $user->PasswordNV)) {
            return response()->json([
                'statusCode' => 401,
                'message' => 'Username or Password is not correct'
            ], 401);
        }

        return response()->json([
            'statusCode' => 200,
            'message' => 'Successfully logged in',
            'account' => $user,
        ], 200);
    }
}
