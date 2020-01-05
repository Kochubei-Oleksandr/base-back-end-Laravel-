<?php

namespace Tests\Feature\location;

use Tests\TestCase;

class CitiesTest extends TestCase
{
    /**
     * Get all cities by region_id
     * @test
     * @return void
     */
    public function getAllCitiesByRegionId()
    {
        $response = $this->getJson('/api/cities?region_id=1');
        $response->assertStatus(200)->assertJsonStructure([
            '*' => [
                'id',
                'region_id',
                'name'
            ]
        ]);
    }
}
