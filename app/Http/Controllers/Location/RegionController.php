<?php

namespace App\Http\Controllers\Location;

use App\Http\Controllers\BaseController;
use App\Models\Location\Region\Region;
use Illuminate\Http\Request;

class RegionController extends BaseController
{
    protected string $modelClassController = Region::class;

    public function getRegionsByCountry(Request $request) {
        return $this->getAllCollectionsWithTranslate()
            ->where($this->tablePluralName.'.country_id', $request->country_id)
            ->get();
    }
}
