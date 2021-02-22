<?php

namespace App\Http\Requests\Backend\Customer;

use App\Models\Customer;
use Illuminate\Validation\Rule;

class UpdateRequest extends BaseRequest
{
    public function rules()
    {
        $rules = parent::rules();

        $rules['account'] = [
            'required',
            'max:30',
            Rule::unique(Customer::$name)->ignore($this->id, Customer::$_id)
        ];
        $rules['email'] = [
            'required',
            'email',
            'max:100',
            Rule::unique(Customer::$name)->ignore($this->id, Customer::$_id)
        ];

        return $rules;
    }

    public function data()
    {
        $data = parent::data();

        return $data;
    }
}
