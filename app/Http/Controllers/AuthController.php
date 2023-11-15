<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Traits\HttpResponses;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    use HttpResponses;
    public function login (Request $request): JsonResponse
    {
        if (Auth::attempt($request->only('email', 'password'))) {
            return $this->response('autorizado', 200, [
                'token' => $request->user()->createToken('cliente')->plainTextToken,
            ]);
        }
        return response()->json([
            'message' => 'Invalid login details',
            'status' => 403,
        ]);
    }
    public function logout(Request $request): JsonResponse
    {
        $request->user()->currentAccessToken()->delete();
        return $this->response('Logged out', 200);
    }
}
