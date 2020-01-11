<?php

namespace App\Http\Controllers\Location;

use App\Http\Controllers\BaseController;
use App\Models\Location\Country\Country;

class CountryController extends BaseController
{
    /**
     * the name of the model must be indicated in each controller
     * @var string
     */
    protected string $modelClassController = Country::class;
}
