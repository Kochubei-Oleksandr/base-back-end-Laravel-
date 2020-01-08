<?php

namespace App\Models;

use App\Traits\BaseModelTrait;
use Illuminate\Database\Eloquent\Model;

class BaseModel extends Model
{
    protected string $modelClass;
    protected string $modelTranslationClass;
    protected string $tableSingularName;
    protected string $tablePluralName;

    public function __construct(string $modelClass = 'App\Models\User')
    {
        dd(['here!!!!!!!!', static::class]);
        $this->modelClass = $modelClass;
        $this->modelTranslationClass = $this->modelClass.'Translation';
        $this->getTableSingularName();
        $this->getTablePluralName();
        parent::__construct();
    }

    public function getTableSingularName(): void
    {
        $this->tableSingularName = lcfirst(substr(strrchr(get_class(new $this->modelClass), "\\"), 1));
    }

    public function getTablePluralName(): void
    {
        $this->tablePluralName = (new $this->modelClass)->getTable();
    }

    public function getAllCollectionsWithTranslate() {
        return $this->modelClass::leftJoin(
            $this->tableSingularName.'_translations',
            $this->tablePluralName.'.id',
            $this->tableSingularName.'_translations.'.$this->tableSingularName.'_id'
        )
            ->where($this->tableSingularName.'_translations.language_id', 1)
            ->select($this->tablePluralName.'.*', $this->tableSingularName.'_translations.name');
    }

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

    public function getOneByUserId(int $id)
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
