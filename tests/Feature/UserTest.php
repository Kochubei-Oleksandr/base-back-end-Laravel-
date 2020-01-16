<?php

namespace Tests\Feature;

class UserTest extends BaseTest
{

    /**
     * all user tests by correct token
     * @test
     * @return void
     */
    public function allUserTestsByCorrectToken()
    {
        $this->setUserToken();
        $this->setUserId();

        $this->getUserInfoAfterRegister();
        $this->updateUserInfo();
        $this->getUserInfoAfterSelectedCity();

        $this->deleteUser();
    }

    /**
     * Get user info when user didnt select city
     * @return void
     */
    public function getUserInfoAfterRegister()
    {
        $response = $this->withHeaders([
            'Authorization' => 'Bearer '.$this->userToken,
        ])->getJson('/api/user');

        $response->assertStatus(200)->assertJsonStructure([
            'id',
            'name',
            'email',
            'usage_policy',
            'mobile',
            'delivery_address',
            'age',
            'language_id',
            'city_id',
            'sex_id',
            'goal_id',
            'lifestyle_id',
            'created_at',
            'updated_at',
        ]);
    }

    /**
     * update user info when user updated all data
     * @return void
     */
    public function updateUserInfo()
    {
        $data = [
            'name' => 'Alex',
            'mobile' => '88888888',
            'delivery_address' => 'testStreet',
            'email' => $this->email,
            'age' => 99,
            'language_id' => 2,
            'city_id' => 1,
            'region_id' => 1,
            'country_id' => 1,

            // TODO - change it after seeds & migrations
            'sex_id' => null,
            'goal_id' => null,
            'lifestyle_id' => null,
        ];

        $response = $this->withHeaders([
            'Authorization' => 'Bearer '.$this->userToken,
        ])->putJson('/api/user/'.$this->userId, $data);

        $response->assertStatus(200)->assertJsonFragment($data);
    }

    /**
     * Get user info when user selected city
     * @return void
     */
    public function getUserInfoAfterSelectedCity()
    {
        $response = $this->withHeaders([
            'Authorization' => 'Bearer '.$this->userToken,
        ])->getJson('/api/user');

        $response->assertStatus(200)->assertJsonStructure([
            'id',
            'name',
            'email',
            'usage_policy',
            'mobile',
            'delivery_address',
            'age',
            'language_id',
            'city_id',
            'region_id',
            'country_id',
            'sex_id',
            'goal_id',
            'lifestyle_id',
            'created_at',
            'updated_at',
        ]);
    }
}
