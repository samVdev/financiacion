<?php

namespace App\Http\Services\User;

use Illuminate\Http\JsonResponse;
use App\Models\User;


class getUserService
{
    static public function index(string $uuid): JsonResponse
    {
        try {
            $user = User::with(['persona' => function($query) {
                $query->select('id', 'fullName', 'phone', 'date', 'direction', 'cedula');
            }])
            ->select('email', 'persona_id', 'role_id')
            ->where('uuid', $uuid)
            ->first();
        
            if (!$user) return response()->json(['message' => 'Usuario no encontrado'], 404);
        
            $data = [
                "email" => $user->email ?? '',
                'name' => $user->persona->fullName ?? '',
                'cedula' => $user->persona->cedula ?? '',
                'dateN' => $user->persona->date ?? '',
                'dir' => $user->persona->direction ?? '',
                'phone' => $user->persona->phone ?? '',
                'role_id' => $user->role_id ?? '0'
            ];
        
            return response()->json($data, 200);
        
        } catch (\Exception $e) {
            return response()->json([
                'message' => 'Ocurrió un error al obtener los datos del usuario'
            ], 500);
        }
        
    }
}
