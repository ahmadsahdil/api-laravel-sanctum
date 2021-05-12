<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;  
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function login(Request $request)
    {
        $user = User::where('email', $request->email)->first();

        if (!$user || !Hash::check($request->password, $user->password)) {
            return response()->json([
                'message' => 'UNAUTHORIZED'
            
            ], 401);
        }

        $token = $user->createToken('token')->plainTextToken;
        return response()->json([
            'message' => 'Success',
            'user'=> $user,
            'token' => $token
        
        ], 401);
    }

    public function logout(Request $request)
    {
        $user = $request->user();
        $user->currentAccessToken()->delete();
        return response()->json([
            'message' => 'Logout berhasil'
        
        ], 200);
        
        
    }
}
