<?php

namespace App\Models\Location\Region;

use App\Models\BaseModel;

class Region extends BaseModel
{
    protected $fillable = ['id'];

    public $timestamps = false;

    public function getRegionById($region_id) {
        $this->init(get_class($this));

        return $this->getAllCollectionsWithTranslate()
            ->where($this->tablePluralName.'.id', $region_id)
            ->first();
    }
}
