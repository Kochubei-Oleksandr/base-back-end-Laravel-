<?php

namespace App\Models\Location\Country;

use App\Models\BaseModel;

class CountryTranslation extends BaseModel
{
    protected $fillable = [
        'id', 'name', 'language_id', 'country_id'
    ];

    public $timestamps = false;
}
