<?php

namespace App\Http\Services\Clients;

use Illuminate\Support\Facades\Hash;
use App\Http\Requests\Client\StoreClientRequest;
use App\Models\User;
use App\Models\Personas;
use Illuminate\Http\JsonResponse;

class StoreClientService
{

    static public function execute(StoreClientRequest $request): JsonResponse
    {
        try {
            $persona = new Personas();
            $persona->fullName = $request->name;
            $persona->phone = $request->phone;
            $persona->cedula = $request->cedula;
            $persona->date = $request->dateN;
            $persona->direction = $request->dir;
            $persona->earnings_month = $request->earnings;
            $persona->save();

            $user = new User();
            $user->email = $request->email;
            $user->password = Hash::make($request->cedula);
            $user->role_id = 3;
            $user->is_admin = false;
            $user->persona_id = $persona->id;
            $user->suspend = false;

            $user->save();

            return response()->json(["message" => "Se ha creado con exito"], 201);
        } catch (\Exception $e) {
            return response()->json([
                'message' => 'Ocurrió un error al crear el cliente'
            ], 500);
        }
    }
}
