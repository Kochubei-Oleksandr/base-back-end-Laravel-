<?php

namespace App\Models\Location\Country;

use App\Models\BaseModel;

class Country extends BaseModel
{
    protected $fillable = ['id'];

    public $timestamps = false;

    public function getCountryById($country_id) {
        $this->init(get_class($this));

        return $this->getAllCollectionsWithTranslate()
            ->where($this->tablePluralName.'.id', $country_id)
            ->first();
    }
}
