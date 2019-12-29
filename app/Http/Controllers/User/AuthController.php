<?php


namespace App\Http\Controllers\User;


use App\Http\Controllers\BaseAuthController;
use App\Http\Requests\User\RegisterRequest;
use App\Models\User;

class AuthController extends BaseAuthController
{
    protected string $guard = 'user';
    protected string $modelClassController = User::class;

    public function register(RegisterRequest $request)
    {
        return $this->registerAttempt($request);
    }
}
