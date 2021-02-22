<?php

namespace App\Http\Requests\Backend\Admin;


use App\General\Config;
use App\Models\Admin;
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
                Rule::unique(Admin::$name),
            ],
            'email'     => [
                'required',
                'max:30',
                Rule::unique(Admin::$name)
            ],
            'password'   => 'required|max:30',
            'status' => [
                'nullable',
                Rule::in(array_keys(Config::STATUS)),
            ],
        ];
    }

    public function data()
    {
        $data = [
            'account' => $this->get('account'),
            'email'    => $this->get('email'),
            'password'  => Hash::make($this->get('password')),

        ];

        if ($this->has('status')) {
            $data['status'] = $this->get('status');
        }

        return $data;
    }
}
