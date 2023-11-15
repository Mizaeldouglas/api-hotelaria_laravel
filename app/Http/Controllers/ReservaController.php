<?php

namespace App\Http\Controllers;

use App\Models\Reserva;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class ReservaController extends Controller
{

    public function index(): JsonResponse
    {
        $reserva = Reserva::with(['quarto', 'cliente'])->get();

        return response()->json($reserva, 200);
    }

    public function store(Request $request): JsonResponse
    {
        $data = $request->validate([
            'data_checkin' => 'required|date',
            'data_checkout' => 'required|date',
            'quarto_id' => 'required|exists:quartos,id',
            'cliente_id' => 'required|exists:clientes,id',
        ]);

        $reserva = Reserva::create($data);
        return response()->json($reserva, 201);
    }


    public function show(string $id)
    {
        $reserva = Reserva::with(['quarto', 'cliente'])->find($id);
        if ($reserva === null) {
            return response()->json(["Error" => "A Reserva com o ID: {$id} não foi encontrada"], 404);
        }
        return response()->json($reserva, 200);
    }

    public function update(Request $request, string $id): JsonResponse
    {
        $reserva = Reserva::find($id);
        if ($reserva === null) {
            return response()->json(["Error" => "A Reserva com o ID: {$id} não foi encontrada"], 404);
        }

        $data = $request->validate([
            'data_checkin' => 'required|date',
            'data_checkout' => 'required|date',
            'quarto_id' => 'required|exists:quartos,id',
            'cliente_id' => 'required|exists:clientes,id',
        ]);

        $reserva->update($data);
        $reserva->save();
        return response()->json($reserva, 200);
    }

    public function destroy(string $id): JsonResponse
    {
        $reserva = Reserva::find($id);

        if ($reserva === null) {
            return response()->json(["Error" => "A Reserva com o ID: {$id} não foi encontrada"], 404);
        }

        $reserva->delete();

        return response()->json($reserva, 204);
    }
}
