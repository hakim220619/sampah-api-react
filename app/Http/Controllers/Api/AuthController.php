<?php

namespace App\Http\Controllers\Api;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;


class AuthController extends Controller
{
    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required',
            'password' => 'required',
        ]);
        $user = User::where('email', $request->email)->first();

        // if ($user == null) {
        //     $user = User::where('nisn', $request->email)->first();
        // }
        if (!$user || !Hash::check($request->password, $user->password)) {
            return response()->json([
                'success' => false,
                'message' => 'The provided credentials are incorrect.',
            ]);
        }
        $token = $user->createToken('authToken')->plainTextToken;
        return response()->json([
            'success' => true,
            'message' => 'Login berhasil',
            'token' => $token,
            'userData' => $user,
        ]);
    }
    public function checkLogin()
    {
        // header('Access-Control-Allow-Origin: *');
        // dd(request()->user()->id);
        // dd("asd");
        $user = User::where('id', request()->user()->id)->first();

        if ($user != null) {
            return response()->json([
                'success' => true,
                'message' => 'Login berhasil',
                'userData' => $user,
            ]);
        } else {
            return response()->json([
                'success' => false,
                'message' => 'Token Expaiedd',
                'userData' => $user,
            ]);
        }
    }
    function getUsers(Request $request)
    {
        $user = User::where('email', $request->email)->first();
        return response()->json([
            'success' => true,
            'message' => 'Data Users',
            'data' => $user,
        ]);
    }
    public function logout(Request $request)
    {
        $request->user()->currentAccessToken()->delete();
        return response()->json([
            'status' => 'success',
            'message' => 'Logout berhasil'
        ]);
    }
}
