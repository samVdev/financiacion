<?php

namespace App\Http\Services\Clients;

use Illuminate\Http\JsonResponse;
use App\Http\Requests\Client\UpdateClientRequest;
use App\Models\Personas;
use App\Models\User;


class UpdateClientService
{
    static public function execute(UpdateClientRequest $request, String $uuid): JsonResponse
    {
        try {
            $user = User::where('uuid', $uuid)->first();

            if (!$user) return response()->json(['message' => 'Cliente no encontrado'], 404);

            $persona = $user->persona;
            if ($persona) {
                $persona->fullName = $request->name;
                $persona->phone = $request->phone;
                $persona->cedula = $request->cedula;
                $persona->date = $request->dateN;
                $persona->direction = $request->dir;
                $persona->earnings_month = $request->earnings;
                $persona->save();
            }

            $user->email = $request->email;
            $user->role_id = 3;
            $user->is_admin = false;
            $user->suspend = false;
            $user->save();

            return response()->json(["message" => "Cliente actualizado con exito"], 200);
        } catch (\Exception $e) {
            return response()->json([
                'message' => 'Ocurrió un error al actualizar el cliente'
            ], 500);
        }
    }
}
