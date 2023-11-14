<?php

namespace App\Http\Controllers;

use App\Models\Cliente;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class ClienteController extends Controller
{

    public function index (): JsonResponse
    {
        $client = Cliente::all();
        if ($client === null) {
            return response()->json(["Error" => "Esse Cliente Não foi encontrado"]);
        }
        return response()->json($client, 200);
    }


    public function store (Request $request): JsonResponse
    {
        $client = Cliente::create($request->all());

        return response()->json($client, 201);
    }


    public function show (string $id): JsonResponse
    {
        $client = Cliente::find($id);
        if ($client === null) {
            return response()->json(["Error" => "O Cliente do ID: {$id} Não foi encontrado"]);
        }
        return response()->json($client, 201);
    }


    public function update (Request $request, string $id)
    {
        $client = Cliente::find($id);

        if ($client === null) {
            return response()->json(["Error" => "O Cliente Com o ID: {$id} Não foi encontrado"]);
        }

        $client->update($request->all());
        $client->save();

        return response()->json($client, 201);
    }


    public function destroy (string $id): JsonResponse
    {
        $client = Cliente::find($id);
        $client->delete();

        return response()->json($client, 204);
    }
}
