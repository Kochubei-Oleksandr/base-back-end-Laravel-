<?php

namespace Tests\Feature\location;

use Tests\TestCase;

class CountriesTest extends TestCase
{
    /**
     * Get all countries
     * @test
     * @return void
     */
    public function getAllCountries()
    {
        $response = $this->get('/api/countries');
        $response->assertStatus(200)->assertJsonStructure([
            '*' => [
                'id',
                'name'
            ]
        ]);
    }
}
