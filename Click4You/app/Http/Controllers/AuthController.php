<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;

use App\Models\User;
use Illuminate\Http\Response;

class AuthController extends Controller
{
    public function login(Request $request)
    {
        $dataValidate = $request->validate([
            'email' => ['required', 'email', 'exists:users,email'],
            'password' => ['required']
        ]);

        $user = User::where('email', $dataValidate['email'])->first();

        if (!Hash::check($dataValidate['password'], $user->password)) {
            throw ValidationException::withMessages([
                'message'=>['email y/o password incorrecto']
            ]);
        }

        $token = $user->createToken('auth_token')->plainTextToken;

        return response()->json([
            'message' => 'Inicio de Sesión Exitoso',
            'token' => $token,
            'data'=> $user->only(['names', 'email'])
        ], Response::HTTP_ACCEPTED);
    }

    
    public function logout(Request $request) 
    {
        $request->user()->currentAccessToken()->delete();

        return response()->json([
            'message' => "Sesión cerrada correctamente"
        ], Response::HTTP_ACCEPTED);
    }
}

?>