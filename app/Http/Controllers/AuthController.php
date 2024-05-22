<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function login(Request $request)
    {
        if (Auth::attempt($request->validate(['email' => ['required', 'email'], 'password' => ['required']]))) {
            $request->session()->regenerate();
            return response()->json(['message' => 'Logged in']);
        } else {
            return response()->json([
                'message' => 'Unauthorized'
            ],401);
        }
    }
}