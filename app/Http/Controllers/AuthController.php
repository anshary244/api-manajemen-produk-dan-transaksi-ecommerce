<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Tymon\JWTAuth\Facades\JWTAuth;

class AuthController extends Controller
{
    // ================= REGISTER =================
    public function register(Request $request)
    {
        User::create([
            'name'=>$request->name,
            'email'=>$request->email,
            'password'=>bcrypt($request->password)
        ]);
        return response()->json(['message'=>'Register berhasil']);
    
    }

    // ================= LOGIN =================

    public function login(Request $request)
    {
        $credentials = $request->only('email', 'password');

        try {
            if (!$token = JWTAuth::attempt($credentials)) {
                return response()->json([
                    'message' => 'Email atau password salah'
                ], 401);
            }
        } catch (\Exception $e) {
            return response()->json([
                'error' => 'Tidak bisa membuat token',
                'detail' => $e->getMessage()
            ], 500);
        }

        return response()->json([
            'message' => 'Login berhasil',
            'token' => $token,
            'type' => 'Bearer'
        ]);
    }


    // ================= PROFILE =================
        

    public function profile(Request $request)
    {
        return response()->json([
            'status' => true,
            'user' => $request->user()
        ]);
    }

    // ================= LOGOUT =================
    public function logout()
    {
        JWTAuth::invalidate(JWTAuth::getToken());

        return response()->json([
            'message' => 'Logout berhasil'
        ]);
    }
}
