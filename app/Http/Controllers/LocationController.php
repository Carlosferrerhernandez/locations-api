<?php

namespace App\Http\Controllers;

use Illuminate\Http\JsonResponse;
use App\Models\Location;
use Exception;

class LocationController extends Controller
{
    public function index(): JsonResponse
    {
        try {
            $locations = Location::all();

            if ($locations->isEmpty()) {
                return response()->json([
                    'message' => 'No locations found',
                    'data' => [],
                ], 404);
            }

            return response()->json([
                'message' => 'Locations retrieved successfully',
                'data' => $locations,
            ], 200);
        } catch (Exception $e) {
            return response()->json([
                'message' => 'An error occurred while retrieving locations',
                'error' => $e->getMessage(),
            ], 500);
        }
    }
}
