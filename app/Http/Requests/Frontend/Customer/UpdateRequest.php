<?php

namespace App\Http\Requests\Frontend\Customer;

use App\General\Config;
use Illuminate\Validation\Rule;

class UpdateRequest extends BaseRequest
{
    public function rules()
    {
        $rules = parent::rules();

        return $rules;
    }

    public function data()
    {
        $data = [
            'name'    => $this->get('name'),
            'phone'   => $this->get('phone'),
            'address' => $this->get('address'),
            'email'   => $this->get('email'),
            'gender'  => $this->get('gender'),
            'area_id' => $this->get('area_id'),

        ];

        return $data;
    }
}
