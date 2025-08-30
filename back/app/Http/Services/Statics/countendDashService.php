<?php

namespace App\Http\Services\Statics;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\JsonResponse;

class countendDashService
{
    static public function execute(Request $request): JsonResponse
    {
        try {
            $clientsCount = User::where('role_id', 3)->count();

            return response()->json([
                "clients" => $clientsCount,
                "bikes" => 10,
                "earnigs" => 20,
                "activesPayment" => 30,
                "manteniment" => 10,
            ]);
      
        } catch (\Throwable $e) {
            return response()->json(['message' => 'Ocurrió un error al procesar la solicitud'], 500);
        }
    }
}
