<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\BaseController;
use App\Models\Location\City\City;
use App\Models\Location\Region\Region;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends BaseController
{
    protected string $modelClassController = User::class;

    public function getOne(Request $request)
    {
        $userData = $this->baseModel->getOne(Auth::id());

        if ($userData->city_id) {
            $city = City::find($userData->city_id);
            $region = Region::find($city->region_id);

            $userData->{"region_id"} = $city->region_id;
            $userData->{"country_id"} = $region->country_id;
        }

        return $userData;
    }

    public function updateOneWithChecking(Request $request) {
        return $this->baseModel->updateOneWithChecking($request->all(), $this->getRequestId($request), 'id', Auth::id())
            ?: $this->responseWithError('This record does not belong to you', 403);
    }
}
