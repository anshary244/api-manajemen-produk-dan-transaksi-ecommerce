<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Tymon\JWTAuth\Facades\JWTAuth;

class AuthController extends Controller
{

public function register(Request $request)
{
    // Validasi input
    $request->validate([
        'name' => 'required|string|max:255',
        'email' => 'required|string|email|max:255|unique:users',
        'password' => 'required|string|min:6',
    ]);

    // Buat user baru
    $user = User::create([
        'name' => $request->name,
        'email' => $request->email,
        'password' => Hash::make($request->password),
    ]);

    // Kirim response beserta data user
    return response()->json([
        'message' => 'Register berhasil',
        'user' => $user  // ini menampilkan data user yang baru dibuat
    ], 201);
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
