<?php

namespace App\Traits;

trait BaseModelTrait
{
    protected string $modelClass;
    protected string $modelTranslationClass;
    protected string $tableSingularName;
    protected string $tablePluralName;

    public function __construct(string $modelClass)
    {
        dump('here!!!!!!!!', $modelClass);
//        $this->modelClass = $modelClass;
//        $this->modelTranslationClass = $this->modelClass.'Translation';
//        $this->getTableSingularName();
//        $this->getTablePluralName();
    }

    public static function init($modelClass) {
        dump('3333333333!!!!!!!!', $modelClass);
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
        dd('herereeeee!#');
        return $this->modelClass::leftJoin(
            $this->tableSingularName.'_translations',
            $this->tablePluralName.'.id',
            $this->tableSingularName.'_translations.'.$this->tableSingularName.'_id'
        )
            ->where($this->tableSingularName.'_translations.language_id', 1)
            ->select($this->tablePluralName.'.*', $this->tableSingularName.'_translations.name');
    }
}
