<?php

namespace App\Models\Location\City;

use App\Models\BaseModel;

class City extends BaseModel
{
    protected $fillable = ['id'];

    public $timestamps = false;

    public function getCityById($city_id) {
        $this->init(get_class($this));

        return $this->getAllCollectionsWithTranslate()
            ->where($this->tablePluralName.'.id', $city_id)
            ->first();
    }

//    public static function getRegionByCity($city_id) {
//        self::where('id', $city_id)->first();
//    }
}
