<?php

namespace App\Http\Requests;

class CalorieCalculatorRequest extends BaseApiRequest
{
    public function rules()
    {
        return [
            'age' => 'required|numeric|max:150',
            'weight' => 'required|numeric|max:300',
            'height' => 'required|numeric|max:300',
            'goal_id' => 'required|integer',
            'sex_id' => 'required|integer',
            'lifestyle_id' => 'required|integer',
        ];
    }
}
