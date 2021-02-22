<?php

namespace App\Http\Requests\Backend\Order;


class UpdateRequest extends BaseRequest
{
    public function rules()
    {
        $rules = parent::rules();

        $rules['status'] ='required';

        return $rules;
    }

    public function data()
    {
        $data = parent::data();

        return $data;
    }
}
