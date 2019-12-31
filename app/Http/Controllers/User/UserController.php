<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\BaseController;
use App\Models\Location\City\City;
use App\Models\Location\Region\Region;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class UserController extends BaseController
{
    protected string $modelClassController = User::class;

    public function getOne()
    {
        $userData = $this->baseModel->getOne(Auth::id());

        $city = City::getCityById($userData->city_id);;
        $region = Region::getRegionById($city->region_id);

        $userData->{"region_id"} = $city->region_id;
        $userData->{"country_id"} = $region->country_id;

        return $userData;
    }
}
