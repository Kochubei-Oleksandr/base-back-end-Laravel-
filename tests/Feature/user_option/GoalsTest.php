<?php

namespace Tests\Feature\user_option;

use Tests\TestCase;

class GoalsTest extends TestCase
{
    /**
     * Get all goals
     * @test
     * @return void
     */
    public function getAllGoals()
    {
        $response = $this->getJson('/api/goals');
        $response->assertStatus(200)->assertJsonStructure([
            '*' => [
                'id',
                'name'
            ]
        ]);
    }
}
