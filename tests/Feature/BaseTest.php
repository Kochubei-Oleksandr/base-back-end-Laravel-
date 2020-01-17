<?php

namespace Tests\Feature;

use App\Models\User;
use Tests\TestCase;

class BaseTest extends TestCase
{
    protected string $userToken = '';
    protected ?int $userId = null;
    protected string $email = 'test333@test.test';
    protected string $password = '88888888';

    /**
     * User registration
     */
    public function registration()
    {
        return $this->postJson('/api/register', [
            'email' => $this->email,
            'password' => $this->password,
            'password_confirmation' => $this->password,
            'usage_policy' => true,
        ]);
    }

    /**
     * set User token
     * @return void
     */
    public function setUserToken() {
        $responseData = $this->registration()->json();
        if (array_key_exists('token', $responseData)) {
            $this->userToken = $responseData['token'];
        }
    }

    /**
     * set User id
     * @return void
     */
    public function setUserId() {
        $responseData = $this->withHeaders([
            'Authorization' => 'Bearer '.$this->userToken,
        ])->getJson('/api/user')->json();
        if (array_key_exists('id', $responseData)) {
            $this->userId = $responseData['id'];
        }
    }

    /**
     * delete user
     * @test
     */
    public function deleteUser()
    {
        $user = User::where('email', $this->email)->first();
        if ($user) {
            $user->delete();
        }

        return $this->assertDatabaseMissing('users', [
            'email' => $this->email,
        ]);
    }
}
