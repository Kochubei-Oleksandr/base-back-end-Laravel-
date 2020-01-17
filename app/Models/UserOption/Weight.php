<?php

namespace App\Models\UserOption;

use App\Models\BaseModel;
use Illuminate\Support\Facades\Auth;

class Weight extends BaseModel
{
    protected $fillable = ['value', 'date', 'user_id'];

    public $timestamps = false;

    public function getLastWeight() {
        $weight = self::select('value')
            ->where('user_id', Auth::id())
            ->orderBy('id', 'desc')
            ->first();

        return $weight ? $weight->value : $weight;
    }

    public function addWeight($request) {
        if ($request->weight) {
            $request->merge(["value" => $request->weight]);
            $model = $this->createOne($request);

            return $model->value;
        }
        return null;
    }
}
