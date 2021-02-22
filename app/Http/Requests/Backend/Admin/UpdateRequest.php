<?php

namespace App\Http\Requests\Backend\Admin;

use App\Models\Admin;
use Illuminate\Validation\Rule;

class UpdateRequest extends BaseRequest
{
    public function rules()
    {
        $rules = parent::rules();

        $rules['account'] = [
            'required',
            'max:30',
            Rule::unique(Admin::$name)->ignore($this->id, Admin::$_id)
        ];
        $rules['email'] = [
            'required',
            'max:30',
            Rule::unique(Admin::$name)->ignore($this->id, Admin::$_id)
        ];

        return $rules;
    }

    public function data()
    {
        $data = parent::data();

        return $data;
    }
}
