<?php


namespace App\Http\Controllers\Organization;


use App\Http\Controllers\BaseAuthController;
use App\Http\Requests\Organization\RegisterRequest;
use App\Models\FoodDeliveryOrganization;

class AuthController extends BaseAuthController
{
    /**
     * the name of the model must be indicated in each controller
     * @var string
     */
    protected string $modelClassController = FoodDeliveryOrganization::class;
    protected string $guard = 'organization';

    public function register(RegisterRequest $request)
    {
        return $this->registerAttempt($request);
    }
}
