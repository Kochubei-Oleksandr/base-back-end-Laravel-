<?php

namespace App\Http\Controllers\Location;

use App\Http\Controllers\BaseController;
use App\Models\Location\Region\Region;
use App\Traits\BaseModelTrait;
use Illuminate\Http\Request;

class RegionController extends BaseController
{
    use BaseModelTrait;

    protected string $modelClassController = Region::class;

    public function getRegionsByCountry(Request $request) {
        $this->init($this->modelClassController);

        return $this->getAllCollectionsWithTranslate()
            ->where($this->tablePluralName.'.country_id', $request->country_id)
            ->get();
    }
}
