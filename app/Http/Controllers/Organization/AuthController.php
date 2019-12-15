<?php


namespace App\Http\Controllers\Organization;


use App\Http\Controllers\BaseAuthController;
use App\Http\Requests\Organization\RegisterRequest;
use App\Models\FoodDeliveryOrganization;

class AuthController extends BaseAuthController
{
    protected $guard = 'organization';
    protected $modelClass = FoodDeliveryOrganization::class;

    public function register(RegisterRequest $request)
    {
        return $this->registerAttempt($request);
    }
}
