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

    public function getOne($id)
    {
        return $this->modelClass::find($id);
    }

    public function createOne(array $modelData)
    {
        return $this->modelClass::create($modelData);
    }

    public function updateOne()
    {

    }

    public function deleteOne($id)
    {
        return $this->modelClass::destroy($id);
    }
}
