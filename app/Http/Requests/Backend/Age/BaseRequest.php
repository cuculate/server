<?php

namespace App\Http\Requests\Backend\Age;


use App\General\Config;
use Illuminate\Validation\Rule;
use Support\Http\Requests\BaseRequest as Request;

class BaseRequest extends Request
{
    public function rules()
    {
        return [
            'name'  => [
                'required',
                'max:100',
            ],
            'status' => [
                'nullable',
                Rule::in(array_keys(Config::STATUS)),
            ],
            'month' => 'required|numeric|min:0|max:999',
        ];
    }

    public function data()
    {
        $data = [
            'name' => $this->get('name'),
            'month'  => $this->get('month'),

        ];

        if ($this->has('status')) {
            $data['status'] = $this->get('status');
        }

        return $data;
    }
}
