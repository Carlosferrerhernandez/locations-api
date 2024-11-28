<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;
use App\Models\Location;

class LocationTest extends TestCase
{
    use RefreshDatabase;

    /**
     * Test to verify the API key is required.
     *
     * @return void
     */
    public function test_api_key_is_required()
    {
        $response = $this->getJson('/api/locations');

        $response->assertStatus(401) // Verifica que el estado sea 401 Unauthorized
            ->assertJson([
                'message' => 'API Key is required',
                'error_code' => 'API_KEY_MISSING',
            ]);
    }

    /**
     * Test to verify the API key is valid.
     *
     * @return void
     */
    public function test_api_key_is_invalid()
    {
        $response = $this->withHeaders([
            'X-API-KEY' => 'invalid-key',
        ])->getJson('/api/locations');

        $response->assertStatus(401) // Verifica que el estado sea 401 Unauthorized
            ->assertJson([
                'message' => 'Invalid API Key',
                'error_code' => 'INVALID_API_KEY',
            ]);
    }

    /**
     * Test to verify locations are returned correctly.
     *
     * @return void
     */
    public function test_locations_are_returned()
    {
        // Crear locaciones de prueba
        Location::factory()->create([
            'code' => 'LOC1',
            'name' => 'Location 1',
            'image' => 'http://example.com/image1.jpg',
            'creation_date' => now(),
        ]);

        Location::factory()->create([
            'code' => 'LOC2',
            'name' => 'Location 2',
            'image' => 'http://example.com/image2.jpg',
            'creation_date' => now(),
        ]);

        $response = $this->withHeaders([
            'X-API-KEY' => config('api.key'),
        ])->getJson('/api/locations');

        $response->assertStatus(200)
            ->assertJsonStructure([
                'data' => [
                    '*' => ['code', 'name', 'image', 'creation_date'],
                ],
            ]);
    }

    /**
     * Test to verify the response is empty when no locations exist.
     *
     * @return void
     */
    public function test_empty_locations_response()
    {
        $response = $this->withHeaders([
            'X-API-KEY' => config('api.key'),
        ])->getJson('/api/locations');

        $response->assertStatus(404)
            ->assertJson([
                'message' => 'No locations found',
                'data' => [],
            ]);
    }
}
