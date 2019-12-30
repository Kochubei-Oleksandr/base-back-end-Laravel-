<?php


namespace App\Http\Controllers;


use App\Http\Requests\LoginRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

abstract class BaseAuthController extends BaseController
{
    protected string $guard;

    public function login(LoginRequest $request)
    {
        return $this->loginAttempt($request->only(['email', 'password']));
    }

    public function registerAttempt(Request $request)
    {
        if (parent::createOne()) {
            return $this->loginAttempt($request->only(['email', 'password']));
        }
        return $this->responseWithError('Something went wrong. Try later', 500);

    }

    protected function loginAttempt(array $credentials)
    {
        if (!$token = Auth::guard($this->guard)->attempt($credentials)) {
            return $this->responseWithError('Unauthorized', 401);
        }

        return $this->successResponse(['token' => $token]);
    }
}
