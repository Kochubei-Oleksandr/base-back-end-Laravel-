<?php

namespace App\Models\Location\Region;

use App\Models\BaseModel;

class Region extends BaseModel
{
    protected $fillable = ['id'];

    public $timestamps = false;

    public static function getRegionById($region_id) {
        return self::where('id', $region_id)->first();
    }
}
