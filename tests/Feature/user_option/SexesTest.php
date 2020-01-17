<?php

namespace Tests\Feature\user_option;

use Tests\TestCase;

class SexesTest extends TestCase
{
    /**
     * Get all goals
     * @test
     * @return void
     */
    public function getAllGoals()
    {
        $response = $this->getJson('/api/sexes');
        $response->assertStatus(200)->assertJsonStructure([
            '*' => [
                'id',
                'name'
            ]
        ]);
    }
}
