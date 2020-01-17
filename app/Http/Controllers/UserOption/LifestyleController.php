<?php

namespace App\Http\Controllers\UserOption;

use App\Http\Controllers\BaseController;
use App\Models\UserOption\Lifestyle\Lifestyle;

class LifestyleController extends BaseController
{
    /**
     * the name of the model must be indicated in each controller
     * @var string
     */
    protected string $modelClassController = Lifestyle::class;
}
