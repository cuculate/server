<?php

namespace App\Http\Requests\Backend\Category;

use App\Models\Category;
use Illuminate\Validation\Rule;

class UpdateRequest extends BaseRequest
{
    public function rules()
    {
        $rules = parent::rules();

        $rules['name'] = [
            'max:50',
            Rule::unique(Category::$name)->ignore($this->id, Category::$_id)
        ];

        return $rules;
    }

    public function data()
    {
        $data = parent::data();

        return $data;
    }
}
