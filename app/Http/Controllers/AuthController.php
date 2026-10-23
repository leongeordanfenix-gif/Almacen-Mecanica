<?php

namespace App\Http/Controllers;

use Illuminate\Http\Request;
use App\Models\Usuario;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
            'rol' => 'required'
        ]);

        $usuario = Usuario::where('email', $request->email)->first();

        if (!$usuario || !Hash::check($request->password, $usuario->password)) {
            return response()->json([
                'status' => 'error',
                'message' => 'Credenciales incorrectas.'
            ], 401);
        }

        if ($usuario->rol !== $request->rol) {
            return response()->json([
                'status' => 'error',
                'message' => 'El rol seleccionado no corresponde a este usuario.'
            ], 403);
        }

        return response()->json([
            'status' => 'success',
            'message' => 'Acceso autorizado',
            'usuario' => [
                'nombre' => $usuario->nombre,
                'email' => $usuario->email,
                'rol' => $usuario->rol
            ]
        ]);
    }
}