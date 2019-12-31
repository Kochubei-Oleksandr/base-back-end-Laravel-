<?php

namespace App\Models\Location\City;

use App\Models\BaseModel;

class City extends BaseModel
{
    protected $fillable = ['id'];

    public $timestamps = false;

    public static function getCityById($city_id) {
        return self::where('id', $city_id)->first();
    }
}
