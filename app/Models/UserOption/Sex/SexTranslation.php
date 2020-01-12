<?php

namespace App\Models\UserOption\Sex;

use App\Models\BaseModel;

class SexTranslation extends BaseModel
{
    protected $fillable = [
        'id', 'name', 'language_id', 'sex_id'
    ];

    public $timestamps = false;
}
