<?php

namespace App\Http\Services\guest;

use App\Models\Factures;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\DB;

class DashboardCount
{
    public static function index(): JsonResponse
    {
        try {
            $user = auth()->user();

            $facturesDB = Factures::select([
                'factures.code',
                'factures.created_at',
                'condominium.Nombre',
                'factures.total_dollars',
                'factures.dollar_bcv'
            ])
            ->where(function ($query) use ($user) {
                $query->whereNotExists(function ($subquery) use ($user) {
                    $subquery->select(DB::raw(1))
                        ->from('receipts')
                        ->join('personas', 'receipts.persona_id', '=', 'personas.id')
                        ->join('users', 'users.persona_id', '=', 'personas.id')
                        ->whereColumn('receipts.facture_id', 'factures.id')
                        ->where('users.uuid', $user->uuid);
                })
                ->orWhereExists(function ($subquery) use ($user) {
                    $subquery->select(DB::raw(1))
                        ->from('receipts')
                        ->join('personas', 'receipts.persona_id', '=', 'personas.id')
                        ->join('users', 'users.persona_id', '=', 'personas.id')
                        ->whereColumn('receipts.facture_id', 'factures.id')
                        ->where('users.uuid', $user->uuid)
                        ->where('receipts.accepted', false);
                });
            })
            ->count();
            

            $paidFactures = Factures::join('receipts', 'factures.id', '=', 'receipts.facture_id')
                ->join('personas', 'receipts.persona_id', '=', 'personas.id')
                ->join('users', 'users.persona_id', '=', 'personas.id')
                ->where('receipts.accepted', true)
                ->where('users.uuid', $user->uuid)
                ->count();

            return response()->json([
                "pending" => $facturesDB,
                "payment" => $paidFactures,
                "total" => $facturesDB + $paidFactures,
            ], 200);
        } catch (\Exception $e) {
            return response()->json([
                "message" => "Ocurrió un error al obtener las facturas del usuario"
            ], 500);
        }
    }
}
