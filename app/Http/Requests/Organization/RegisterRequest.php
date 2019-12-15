<?php

namespace App\Http\Requests\Organization;

use App\Http\Requests\BaseApiRequest;

class RegisterRequest extends BaseApiRequest
{
    public function rules()
    {
        return [
            'email' => 'required|email|unique:food_delivery_organizations',
            'password' => 'required',
        ];
    }
}
