<?php

namespace Tests\Feature;

use App\Models\User;
use Tests\TestCase;

class UserAuthTest extends TestCase
{
    /**
     * First register (unique email)
     * @test
     * @return void
     */
    public function firstRegisterTest()
    {
        $response = $this->postJson('/api/register', ['email' => 'test@test.test', 'password' => '88888888']);
        $response->assertStatus(200)->assertJson(['token' => true]);
    }

    /**
     * This email is used (test@test.test)
     * @test
     * @return void
     */
    public function secondRegisterTest()
    {
        $response = $this->postJson('/api/register', ['email' => 'test@test.test', 'password' => '88888888']);
        $response->assertStatus(422);
    }

    /**
     * Login with existing credentials
     * @test
     * @return void
     */
    public function firstLoginTest()
    {
        $response = $this->postJson('/api/login', ['email' => 'test@test.test', 'password' => '88888888']);
        $response->assertStatus(200)->assertJson(['token' => true]);
    }

    /**
     * Checking user exists
     * @test
     * @return void
     */
    public function isUserExistsTest()
    {
        $this->assertDatabaseHas('users', [
            'email' => 'test@test.test',
        ]);

        User::where('email', 'test@test.test')->delete();

        $this->assertDatabaseMissing('users', [
            'email' => 'test@test.test',
        ]);
    }

    /**
     * Login with nonexistent credentials
     * @test
     * @return void
     */
    public function secondLoginTest()
    {
        $response = $this->postJson('/api/login', ['email' => 'test@test.test', 'password' => '']);
        $response->assertStatus(422);
    }
}
