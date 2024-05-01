<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Facades\Auth;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class AuthController extends Auth
{
    public function signIn(Request $request)
    {
        // Validate the incoming request data
        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        // Attempt to authenticate the user
        if (Auth::attempt($credentials)) {
            $user = Auth::user();

            // Generate a new token
            // $token = $user->createToken('auth-token');
            $token=$user->createToken('auth-token')->plainTextToken;

            // Return the token along with the user data
            return response()->json(['user' => $user, 'token' => $token]);
        } else {
            // Authentication failed, return an error response
            return response()->json(['error' => 'Invalid credentials'], 401);
        }
    }

    public function signup(Request $request)
    {

        $data = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8|confirmed',
        ]);

        $user = new User();
        $user->name = $data['name'];
        $user->email = $data['email'];
        $user->password = bcrypt($data['password']);
        $user->save();



        return response()->json(['message' => 'User registered successfully', 'user' => $user], 201);
    }
}
