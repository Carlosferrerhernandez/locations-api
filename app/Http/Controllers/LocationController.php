<?php

namespace App\Http\Controllers;

use App\Models\Location;
use Exception;
use Illuminate\Http\JsonResponse;

/**
 * Handles the retrieval of locations and returns JSON responses.
 */
class LocationController extends Controller
{
    /**
     * Fetch all locations from the database.
     *
     * Returns a JSON response with the list of locations if found,
     * or an appropriate error message and HTTP status code if not.
     */
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
                'message' => 'Error retrieving locations',
                'error' => $e->getMessage(),
            ], 500);
        }
    }
}
