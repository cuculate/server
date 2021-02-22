<?php

namespace App\Http\Requests\Backend\Payment;

use App\Models\Payment;
use Illuminate\Validation\Rule;

class UpdateRequest extends BaseRequest
{
    public function rules()
    {
        $rules = parent::rules();

        $rules['name'] = [
            'required',
            'max:30',
            Rule::unique(Payment::$name)->ignore($this->id, Payment::$_id)
        ];

        return $rules;
    }

    public function data()
    {
        $data = parent::data();

        return $data;
    }
}
