<?php

namespace App\Services;

use App\Models\Location\City\City;
use App\Models\Location\Region\Region;

class UserService
{
    public static function addLocation($userData)
    {
        if ($userData->city_id) {
            $city = City::find($userData->city_id);
            $region = Region::find($city->region_id);

            $userData->{"region_id"} = $city->region_id;
            $userData->{"country_id"} = $region->country_id;
        }

        return $userData;
    }
}
