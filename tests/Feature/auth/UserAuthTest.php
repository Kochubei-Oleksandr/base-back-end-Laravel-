<?php

namespace Tests\Feature\auth;

use App\Models\User;
use Tests\Feature\BaseTest;

class UserAuthTest extends BaseTest
{
    /**
     * First register (unique email)
     * @test
     * @return void
     */
    public function firstRegisterTest()
    {
        $response = $this->registration();
        $response->assertStatus(200)->assertJson(['token' => true]);
    }

    /**
     * This email is used (test333@test.test)
     * @test
     * @return void
     */
    public function secondRegisterTest()
    {
        $response = $this->registration();
        $response->assertStatus(422);
    }

    /**
     * Login with existing credentials
     * @test
     * @return void
     */
    public function firstLoginTest()
    {
        $response = $this->postJson('/api/login', ['email' => $this->email, 'password' => $this->password]);
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
            'email' => $this->email,
        ]);

        $this->deleteUser();
    }

    /**
     * Login with nonexistent credentials
     * @test
     * @return void
     */
    public function secondLoginTest()
    {
        $response = $this->postJson('/api/login', ['email' => $this->email, 'password' => $this->password]);
        $response->assertStatus(403);
    }
}
