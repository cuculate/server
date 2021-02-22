<?php

namespace App\Http\Requests\Backend\Area;

use App\Models\Area;
use Illuminate\Validation\Rule;

class UpdateRequest extends BaseRequest
{
    public function rules()
    {
        $rules = parent::rules();

        $rules['name'] = [
            'required',
            'max:30',
            Rule::unique(Area::$name)->ignore($this->id, Area::$_id)
        ];

        return $rules;
    }

    public function data()
    {

        $data = parent::data();

        return $data;
    }
}
