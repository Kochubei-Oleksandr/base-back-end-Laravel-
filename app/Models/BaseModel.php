<?php

namespace App\Models;

use App\Traits\CrudModelTrait;
use Illuminate\Database\Eloquent\Model;

abstract class BaseModel extends Model
{
    use CrudModelTrait;

    public function __construct()
    {
        $this->initCrud();
        parent::__construct();
    }
}
