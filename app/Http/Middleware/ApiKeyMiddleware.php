<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class ApiKeyMiddleware
{
    /**
     * Handle an incoming request.
     */
    public function handle(Request $request, Closure $next): Response
    {
        $apiKey = config('api.key');

        if (! $request->hasHeader('X-API-KEY')) {
            return response()->json([
                'message' => 'API Key is required',
                'error_code' => 'API_KEY_MISSING',
            ], 401);
        }

        if ($request->header('X-API-KEY') !== $apiKey) {
            return response()->json([
                'message' => 'Invalid API Key',
                'error_code' => 'INVALID_API_KEY',
            ], 401);
        }

        /** @var Response $response */
        $response = $next($request);

        return $response;
    }
}
