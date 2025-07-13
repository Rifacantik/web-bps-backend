<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    /**
     * Method untuk login dan autentikasi pengguna.
     */
    public function login(Request $request)
    {
        // Validasi data login yang dikirimkan
        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        // Cek apakah kredensial valid dan cocok dengan data yang ada
        if (!Auth::attempt($credentials)) {
            // Jika gagal, kirimkan respon gagal
            return response()->json(['message' => 'Login gagal'], 401);
        }

        // Ambil data user yang berhasil login
        /** @var \App\Models\User $user */
        $user = Auth::user();

        // Membuat token untuk user yang berhasil login
        $token = $user->createToken('api-token')->plainTextToken;

        // Kirimkan respon berupa data user dan token
        return response()->json([
            'user' => $user,
            'token' => $token,
        ]);
    }

    //methode untuk logout
    public function logout(Request $request)
    {
        //hapus token yang sedang aktif seblum keluar
        $request->user()->currentAccessToken()->delete();
        return response()->json(['message'=> 'Logout berhasil'], 200);
    }
}