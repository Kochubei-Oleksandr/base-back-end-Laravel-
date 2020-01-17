<?php

namespace App\Models\UserOption\Lifestyle;

use App\Models\BaseModel;

class Lifestyle extends BaseModel
{
    protected $fillable = ['id', 'kcal_per_hour'];

    public $timestamps = false;
}
