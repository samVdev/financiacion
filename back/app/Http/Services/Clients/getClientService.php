<?php

namespace App\Http\Services\Clients;

use Illuminate\Http\JsonResponse;
use App\Models\User;


class getClientService
{
    static public function index(string $uuid): JsonResponse
    {
        try {
            $user = User::with(['persona' => function($query) {
                $query->select('id', 'fullName', 'phone', 'date', 'direction', 'cedula', 'earnings_month');
            }])
            ->select('email', 'persona_id', 'role_id')
            ->where('uuid', $uuid)
            ->first();
        
            if (!$user) return response()->json(['message' => 'Cliente no encontrado'], 404);
        
            $data = [
                "email" => $user->email ?? '',
                'name' => $user->persona->fullName ?? '',
                'cedula' => $user->persona->cedula ?? '',
                'dateN' => $user->persona->date ?? '',
                'dir' => $user->persona->direction ?? '',
                'phone' => $user->persona->phone ?? '',
                'earnings' => $user->persona->earnings_month ?? '',
            ];
        
            return response()->json($data, 200);
        
        } catch (\Exception $e) {
            return response()->json([
                'message' => 'Ocurrió un error al obtener los datos del cliente'
            ], 500);
        }
        
    }
}
