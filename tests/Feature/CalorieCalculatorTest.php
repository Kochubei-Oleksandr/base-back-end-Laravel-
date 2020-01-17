<?php

namespace Tests\Feature;

class CalorieCalculatorTest extends BaseTest
{

    /**
     * all user tests by correct token
     * @test
     * @return void
     */
    public function allUserParamsTests()
    {
        $this->setUserToken();
        $this->setUserId();

        $this->getUserParamsAfterRegister();
        $this->updateUserParams();

        $this->deleteUser();
    }

    /**
     * Get user info when user didnt select city
     * @return void
     */
    public function getUserParamsAfterRegister()
    {
        $response = $this->withHeaders([
            'Authorization' => 'Bearer '.$this->userToken,
        ])->getJson('/api/user-params');

        $response->assertStatus(200)->assertJsonStructure([
            'id',
            'age',
            'goal_id',
            'sex_id',
            'lifestyle_id',
            'weight',
            'height',
        ]);
    }

    /**
     * update user info when user updated all data
     * @return void
     */
    public function updateUserParams()
    {
        $datar = [
            'id' => $this->userId,
            'age' => 99,
            'sex_id' => 2,
            'goal_id' => 2,
            'lifestyle_id' => 2,
            'weight' => 200,
            'height' => 220,
        ];

        $response = $this->withHeaders([
            'Authorization' => 'Bearer '.$this->userToken,
        ])->putJson('/api/user-params/'.$this->userId, $datar);

        $response->assertStatus(200)->assertJsonFragment($datar);
    }
}
