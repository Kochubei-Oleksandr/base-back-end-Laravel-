<?php

namespace App\Models\Location\Region;

use App\Models\BaseModel;

class RegionTranslation extends BaseModel
{
    protected $fillable = [
        'id', 'name', 'language_id', 'region_id'
    ];

    public $timestamps = false;
}
