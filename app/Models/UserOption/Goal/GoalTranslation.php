<?php

namespace App\Models\UserOption\Goal;

use App\Models\BaseModel;

class GoalTranslation extends BaseModel
{
    protected $fillable = [
        'id', 'name', 'language_id', 'goal_id'
    ];

    public $timestamps = false;
}
