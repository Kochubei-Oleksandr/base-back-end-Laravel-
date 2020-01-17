<?php

namespace App\Http\Controllers\UserOption;

use App\Http\Controllers\BaseController;
use App\Models\UserOption\Goal\Goal;

class GoalController extends BaseController
{
    /**
     * the name of the model must be indicated in each controller
     * @var string
     */
    protected string $modelClassController = Goal::class;
}
