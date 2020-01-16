<?php

namespace App\Traits;

trait BaseModelTrait
{
    use CoreBaseModelTrait;

    /**
     * Return a collections of one or more records with or without translation
     *
     * @param array $params - use for filter 'where'
     * @param int|null $id - to display the specific record
     * @return mixed
     */
    public function getCollections(array $params, int $id = null)
    {
        if (class_exists($this->modelTranslationClass)) {
            $query = $this->getCollectionsWithTranslate($params['language'], $id);
        } else {
            if($id) {
                $query = $this->modelClass::where($this->tablePluralName.'.id', $id);
            } else {
                $query = new $this->modelClass;
            }
        }

        $params = $this->getQueryParams($this->filteringForParams($params));

        return $query->where($params);
    }

    /**
     * Creating a new record in the database
     * Return the created record
     *
     * @param array $modelData - data for recording
     * @return mixed
     */
    public function createOne(array $modelData)
    {
        return $this->modelClass::create($modelData);
    }

    /**
     * Updates the model and then returns it (with checking for compliance of the record to the user)
     *
     * @param array $modelData - data for updating
     * @param int $id - ID record to update
     * @param string $columnName - column name to check whether a record matches a specific user
     * @param $valueForColumnName - column value to check whether a record matches a specific user
     * @return bool
     */
    public function updateOne(array $modelData, int $id, string $columnName, $valueForColumnName)
    {
        if ($model = $this->getOneRecord($id)) {
            return $this->isRecordBelongToUser($model, $columnName, $valueForColumnName)
                ? $this->updateOneRecord($modelData, $model)
                : false;
        } else {
            return false;
        }
    }

    /**
     * Delete one record with checking for compliance of the record to the user
     *
     * @param int $id - ID record to delete
     * @param string $columnName - column name to check whether a record matches a specific user
     * @param $valueForColumnName - column value to check whether a record matches a specific user
     * @return bool
     */
    public function deleteOne(int $id, string $columnName, $valueForColumnName)
    {
        if ($model = $this->getOneRecord($id)) {
            return $this->isRecordBelongToUser($model, $columnName, $valueForColumnName)
                ? $model->delete()
                : false;
        } else {
            return false;
        }
    }
}
