<?php

namespace App\Http\Controllers;

use App\Models\Quarto;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class QuartoController extends Controller
{
    public function listarDisponiveis()
    {
        $quartosDisponiveis = Quarto::where('disponivel', true)->get();

        return response()->json($quartosDisponiveis);
    }

    public function index (): JsonResponse
    {
        $quartos = Quarto::all();

        return response()->json($quartos);
    }

    public function store (Request $request): JsonResponse
    {
        $quarto = Quarto::create($request->all());

        return response()->json($quarto);
    }

    public function show (string $id)
    {
        $quarto = Quarto::find($id);
        return response()->json($quarto, 201);
    }

    public function update (Request $request, string $id): JsonResponse
    {
        $quarto = Quarto::find($id);

        $quarto->update($request->all());
        $quarto->save();

        return response()->json($quarto,200);
    }

    public function destroy (Quarto $quarto): JsonResponse
    {
        $quarto->delete();

        return response()->json($quarto, 204);
    }
}
