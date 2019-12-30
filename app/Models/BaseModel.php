<?php

namespace App\Models;

use App\Traits\BaseModelTrait;
use Illuminate\Database\Eloquent\Model;

class BaseModel extends Model
{
    use BaseModelTrait;

    public function getAll()
    {
        return class_exists($this->modelTranslationClass)
            ? $this->getAllCollectionsWithTranslate()->get()
            : $this->modelClass::all();
    }

    public function getOne(int $id)
    {
        return $this->modelClass::find($id);
    }

    public function createOne(array $modelData)
    {
        return $this->modelClass::create($modelData);
    }

    public function updateOne(array $modelData, int $id)
    {
        $model = $this->getOne($id);
        $filteredModelData = array_filter(
            $modelData,
            function ($key) use ($model) {
                return in_array($key, $model->getFillable());
            },
            ARRAY_FILTER_USE_KEY
        );

        $model->fill($filteredModelData);
        $model->save();

        return $model->refresh();
    }

    public function deleteOne(int $id)
    {
        return $this->modelClass::destroy($id);
    }
}
