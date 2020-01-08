<?php

namespace App\Traits;

trait CrudModelTrait
{
    protected string $modelClass;
    protected string $modelTranslationClass;
    protected string $tableSingularName;
    protected string $tablePluralName;

    public function initCrud()
    {
        $this->modelClass = static::class;
        $this->modelTranslationClass = $this->modelClass.'Translation';
        $this->setTableSingularName();
        $this->setTablePluralName();
    }

    public function setTableSingularName(): void
    {
        $this->tableSingularName = lcfirst(substr(strrchr($this->modelClass, "\\"), 1));
    }

    public function getTableSingularName(): string
    {
        return $this->tableSingularName;
    }

    public function setTablePluralName(): void
    {
        $this->tablePluralName = $this->modelClass::getTable();
    }

    public function getTablePluralName(): string
    {
        return $this->tablePluralName;
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
