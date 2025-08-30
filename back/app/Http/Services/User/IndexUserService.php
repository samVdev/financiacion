<?php

namespace App\Http\Services\User;

//use App\Http\Resources\UserCollection;
//use App\Http\Resources\UserResource;

use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;
use App\Models\User;
use Illuminate\Support\Facades\DB;

class IndexUserService
{

    static public function execute(Request $request): JsonResponse
    {
        try {
            $offset = $request->input("offset", 0);
            $limit = $request->input("limit", 10);
            $search = $request->input("search");
            $sort = $request->input("sort");
            $facture = $request->input("facture");
            $direction = $request->input("direction") == "desc" ? "desc" : "asc";

            $query = User::query()
                ->join('personas', 'users.persona_id', '=', 'personas.id')
                ->join('roles', 'roles.id', '=', 'users.role_id')
                ->select(
                    'fullName',
                    'phone',
                    'name',
                    'email',
                    'users.uuid',
                )
                ->groupBy('fullName', 'phone', 'name', 'email', 'users.uuid');

            if ($search) {
                $query->where(function ($query) use ($search) {
                    $query
                        ->where("personas.fullName", "ilike", "%$search%")
                        ->orWhere("roles.name", "ilike", "%$search%")
                        ->orWhere("users.email", "ilike", "%$search%")
                        ->orWhere("personas.phone", "ilike", "%$search%");
                });
            }

            if ($sort) {
                $columnMap = [
                    'name' => 'fullName',
                    'email' => 'email',
                    'phone' => 'phone',
                    'rol' => 'name'
                ];
                if (isset($columnMap[$sort])) {
                    $query->orderBy($columnMap[$sort], $direction);
                }
            }

            $users = $query->skip($offset)->take($limit)->get();

            $users = $users->map(function ($user) {
                return [
                    'uuid' => $user->uuid,
                    'rol' => $user->name,
                    'email' => $user->email,
                    'phone' => $user->phone,
                    'nombre' => $user->fullName,
                ];
            });

            // Retornar la respuesta con paginación
            return response()->json([
                "rows" => $users,
                "offset" => $offset,
                "limit" => $limit,
                "sort" => $sort,
                "direction" => $direction,
                "search" => $search
            ]);
        } catch (\Throwable $e) {
            return response()->json(['message' => 'Ocurrió un error al procesar la solicitud'], 500);
        }
    }
}
