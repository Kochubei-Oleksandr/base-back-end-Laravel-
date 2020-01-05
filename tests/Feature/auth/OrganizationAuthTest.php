<?php

namespace Tests\Feature\auth;

use App\Models\FoodDeliveryOrganization;
use Tests\TestCase;

class OrganizationAuthTest extends TestCase
{
    /**
     * First register (unique email)
     * @test
     * @return void
     */
    public function firstRegisterTest()
    {
        $response = $this->postJson('/api/organization/register', [
            'email' => 'test333@test.test',
            'password' => '88888888',
            'password_confirmation' => '88888888',
            'usage_policy' => true,
        ]);
        $response->assertStatus(200)->assertJson(['token' => true]);
    }

    /**
     * This email is used (test333@test.test)
     * @test
     * @return void
     */
    public function secondRegisterTest()
    {
        $response = $this->postJson('/api/organization/register', ['email' => 'test333@test.test', 'password' => '88888888']);
        $response->assertStatus(422);
    }

    /**
     * Login with existing credentials
     * @test
     * @return void
     */
    public function firstLoginTest()
    {
        $response = $this->postJson('/api/organization/login', ['email' => 'test333@test.test', 'password' => '88888888']);
        $response->assertStatus(200)->assertJson(['token' => true]);
    }

    /**
     * Checking user exists
     * @test
     * @return void
     */
    public function isUserExistsTest()
    {
        $this->assertDatabaseHas('food_delivery_organizations', [
            'email' => 'test333@test.test',
        ]);

        FoodDeliveryOrganization::where('email', 'test333@test.test')->delete();

        $this->assertDatabaseMissing('food_delivery_organizations', [
            'email' => 'test333@test.test',
        ]);
    }

    /**
     * Login with nonexistent credentials
     * @test
     * @return void
     */
    public function secondLoginTest()
    {
        $response = $this->postJson('/api/organization/login', ['email' => 'test333@test.test', 'password' => '88888888']);
        $response->assertStatus(401);
    }
}
