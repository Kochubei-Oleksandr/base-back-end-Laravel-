<?php

namespace Tests\Feature\location;

use Tests\TestCase;

class RegionsTest extends TestCase
{
    /**
     * Get all regions by country_id
     * @test
     * @return void
     */
    public function getAllRegionsByCountryId()
    {
        $response = $this->getJson('/api/regions?country_id=1');
        $response->assertStatus(200)->assertJsonStructure([
            '*' => [
                'id',
                'country_id',
                'name'
            ]
        ]);
    }
}
