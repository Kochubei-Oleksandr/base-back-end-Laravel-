<?php

namespace App\Models\UserOption;

use App\Models\BaseModel;
use Illuminate\Support\Facades\Auth;

class Height extends BaseModel
{
    protected $fillable = ['value', 'date', 'user_id'];

    public $timestamps = false;

    public function getLastHeight() {
        $height = self::select('value')
            ->where('user_id', Auth::id())
            ->orderBy('id', 'desc')
            ->first();

        return $height ? $height->value : $height;
    }

    public function addHeight($request) {
        if ($request->height) {
            $request->merge(["value" => $request->height]);
            $model = $this->createOne($request);

            return $model->value;
        }
        return null;
    }
}
