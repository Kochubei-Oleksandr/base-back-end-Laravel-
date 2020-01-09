<?php

namespace App\Http\Controllers\Location;

use App\Http\Controllers\BaseController;
use App\Models\Location\City\City;
use Illuminate\Http\Request;

class CityController extends BaseController
{
    protected string $modelClassController = City::class;

    public function getCitiesByRegion(Request $request) {
        return $this->getAllCollectionsWithTranslate()
            ->where($this->getTablePluralName().'.region_id', $request->region_id)
            ->get();
    }
}
