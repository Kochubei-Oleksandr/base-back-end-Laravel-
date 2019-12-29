<?php

namespace App\Http\Controllers\Location;

use App\Http\Controllers\BaseController;
use App\Models\Location\City\City;
use App\Traits\BaseModelTrait;
use Illuminate\Http\Request;

class CityController extends BaseController
{
    use BaseModelTrait;

    protected string $modelClassController = City::class;

    public function getCitiesByRegion(Request $request) {
        $this->init($this->modelClassController);

        return $this->getAllCollectionsWithTranslate()
            ->where($this->tablePluralName.'.region_id', $request->region_id)
            ->get();
    }
}
