<?php

namespace App\Http\Controllers\Location;

use App\Http\Controllers\BaseController;
use App\Models\Location\Country\Country;

class CountryController extends BaseController
{
    protected string $modelClassController = Country::class;
}
