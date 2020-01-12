<?php

namespace Tests\Feature\user_option;

use Tests\TestCase;

class LifestylesTest extends TestCase
{
    /**
     * Get all goals
     * @test
     * @return void
     */
    public function getAllGoals()
    {
        $response = $this->getJson('/api/lifestyles');
        $response->assertStatus(200)->assertJsonStructure([
            '*' => [
                'id',
                'name',
                'kcal_per_hour'
            ]
        ]);
    }
}
