<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class ApiKeyMiddleware
{
    public function handle(Request $request, Closure $next)
    {
        $apiKey = config('api.key'); // Carga la API Key configurada

        // Verifica si no se envió la API Key
        if (!$request->hasHeader('X-API-KEY')) {
            return response()->json([
                'message' => 'API Key is required',
                'error_code' => 'API_KEY_MISSING'
            ], 401);
        }

        // Verifica si la API Key enviada es inválida
        if ($request->header('X-API-KEY') !== $apiKey) {
            return response()->json([
                'message' => 'Invalid API Key',
                'error_code' => 'INVALID_API_KEY'
            ], 401);
        }

        return $next($request);
    }
}
