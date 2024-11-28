<?php

namespace App\Http\Controllers;

use Illuminate\Http\JsonResponse;

class LocationController extends Controller
{
    public function index(): JsonResponse
    {
        $locations = [
            [
                'code' => 1,
                'name' => 'Sede Principal',
                'image' => 'https://via.placeholder.com/150',
                'creationDate' => '2024-01-01',
            ],
            [
                'code' => 2,
                'name' => 'Sede Secundaria',
                'image' => 'https://via.placeholder.com/150',
                'creationDate' => '2024-02-01',
            ],
        ];

        return response()->json($locations);
    }
}
