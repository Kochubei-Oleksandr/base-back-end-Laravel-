<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\BaseController;
use App\Models\Location\City\City;
use App\Models\Location\Country\Country;
use App\Models\Location\Region\Region;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class UserController extends BaseController
{
    protected string $modelClassController = User::class;

    public function getOne()
    {
        $userData = $this->baseModel->getOne(Auth::id());

        $city = (new City)->getCityById($userData->city_id);
        $region = (new Region)->getRegionById($city->region_id);
        $country = (new Country)->getCountryById($region->country_id);

        // TODO - it needs to be done at the front-end
        $userData->{"city_id"} = (object) array(
            'id' => $city->id,
            'name' => $city->name
        );
        $userData->{"region_id"} = (object) array(
            'id' => $region->id,
            'name' => $region->name
        );
        $userData->{"country_id"} = (object) array(
            'id' => $country->id,
            'name' => $country->name
        );

        return $userData;
    }
}
