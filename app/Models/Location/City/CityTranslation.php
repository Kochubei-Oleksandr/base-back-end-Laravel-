<?php

namespace App\Models\Location\City;

use App\Models\BaseModel;

class CityTranslation extends BaseModel
{
    protected $fillable = [
        'id', 'name', 'language_id', 'city_id'
    ];

    public $timestamps = false;
}
