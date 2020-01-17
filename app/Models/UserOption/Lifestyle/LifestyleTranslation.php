<?php

namespace App\Models\UserOption\Lifestyle;

use App\Models\BaseModel;

class LifestyleTranslation extends BaseModel
{
    protected $fillable = [
        'id', 'name', 'language_id', 'lifestyle_id'
    ];

    public $timestamps = false;
}
