<?php

namespace App\Http\Controllers;

use Illuminate\Http\JsonResponse;
use App\Models\Location;

class LocationController extends Controller
{
    public function index(): JsonResponse
    {
        $locations = Location::all(); // Obtiene todas las sedes desde la base de datos
        return response()->json($locations);
    }
}
