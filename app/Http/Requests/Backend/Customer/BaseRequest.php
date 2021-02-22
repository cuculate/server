<?php

namespace App\Http\Requests\Backend\Customer;


use App\General\Config;
use App\Models\Customer;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rule;
use Support\Http\Requests\BaseRequest as Request;

class BaseRequest extends Request
{
    public function rules()
    {
        return [
            'account'  => [
                'required',
                'max:30',
                Rule::unique(Customer::$name),
            ],
            'password' => [
                'required',
                'max:256',
            ],
            'name'     => 'required|max:100',
            'phone'    => 'max:20',
            'address'  => 'max:500',
            'email'    => [
                'required',
                'max:100',
                'email',
                Rule::unique(Customer::$name),
            ],
            'gender'   => [
                'required',
                Rule::in(array_keys(Config::GENDER)),
            ],
            'area_id'  => 'required',
            'status'   => [
                'nullable',
                Rule::in(array_keys(Config::STATUS)),
            ],
        ];
    }

    public function data()
    {
        $data = [
            'account'  => $this->get('account'),
            'password' => Hash::make($this->get('password')),
            'name'     => $this->get('name'),
            'phone'    => $this->get('phone'),
            'address'  => $this->get('address'),
            'email'    => $this->get('email'),
            'gender'   => $this->get('gender'),
            'area_id'  => $this->get('area_id'),

        ];

        if ($this->has('status')) {
            $data['status'] = $this->get('status');
        }

        return $data;
    }
}
