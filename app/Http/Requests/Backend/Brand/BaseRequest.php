<?php

namespace App\Http\Requests\Backend\Brand;


use App\General\Config;
use App\Models\Brand;
use Illuminate\Validation\Rule;
use Support\Http\Requests\BaseRequest as Request;

class BaseRequest extends Request
{
    public function rules()
    {
        return [
            'name'      => [
                'required',
                'max:150',
                Rule::unique(Brand::$name),
            ],
            'phone'      => 'max:20',
            'address'   => 'max:500',
            'web'      => 'max:50',
            'email'    => 'max:50',
            'information' => 'max:2000',
            'status'  => [
                'nullable',
                Rule::in(array_keys(Config::STATUS)),
            ],
        ];
    }

    public function data()
    {
        $data = [
            'name'      => $this->get('name'),
            'phone'      => $this->get('phone'),
            'address'   => $this->get('address'),
            'web'      => $this->get('web'),
            'email'    => $this->get('email'),
            'information' => $this->get('information'),
        ];

        if ($this->has('status')) {
            $data['status'] = $this->get('status');
        }

        return $data;
    }
}
