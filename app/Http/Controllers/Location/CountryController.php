<?php

namespace App\Http\Controllers\Location;

use App\Http\Controllers\BaseController;
use App\Models\BaseModel;
use App\Models\Location\Country\Country;
use Illuminate\Http\Request;

class CountryController extends BaseController
{
    protected string $modelClassController = Country::class;
}
