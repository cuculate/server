<?php

namespace App\Http\Requests\Backend\Brand;

use App\Models\Brand;
use Illuminate\Validation\Rule;

class UpdateRequest extends BaseRequest
{
    public function rules()
    {
        $rules = parent::rules();

        $rules['name'] = [
            'required',
            'max:150',
            Rule::unique(Brand::$name)->ignore($this->id, Brand::$_id)
        ];

        return $rules;
    }

    public function data()
    {
        $data = parent::data();

        return $data;
    }
}
