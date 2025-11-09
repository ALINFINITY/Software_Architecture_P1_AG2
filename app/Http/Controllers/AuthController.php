<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Usuario;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;

/**
 * Controlador de autenticación para usuarios.
 * Gestiona el registro, inicio y cierre de sesión usando tokens personales (Sanctum).
 */
class AuthController extends Controller
{


    /**
     * Autentica un usuario y devuelve un token si las credenciales son válidas.
     
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\JsonResponse
     * @throws \Illuminate\Validation\ValidationException
     */
    public function login(Request $request)
    {
        // Validar formato de correo y existencia de contraseña
        $request->validate([
            'correo' => 'required|email',
            'password' => 'required|string',
        ]);

        $usuario = Usuario::where('correo', $request->correo)->first();

        // Verificar credenciales
        if (!$usuario || !Hash::check($request->password, $usuario->password)) {
            throw ValidationException::withMessages([
                'correo' => ['Las credenciales no son válidas.'],
            ]);
        }

        // Generar token personal para autenticación API
        $token = $usuario->createToken('token_auth')->plainTextToken;

        return response()->json([
            'message' => 'Inicio de sesión exitoso.',
            'usuario' => $usuario,
            'token' => $token,
        ]);
    }

    /**
     * Cierra la sesión eliminando el token de acceso actual.
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function logout(Request $request)
    {
        // Elimina solo el token actual, no afecta otros dispositivos/sesiones
        $request->user()->currentAccessToken()->delete();

        return response()->json([
            'message' => 'Sesión cerrada correctamente.',
        ]);
    }
}
